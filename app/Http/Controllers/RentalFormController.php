<?php
namespace App\Http\Controllers;
session_start();
require __DIR__ . '/../../../vendor/autoload.php';

$access_token = (env('USE_PROD') == 'true') ? env('PROD_ACCESS_TOKEN')
    : env('SANDBOX_ACCESS_TOKEN');
$location_id = (env('USE_PROD') == 'true') ? env('PROD_LOCATION_ID')
    : env('SANDBOX_LOCATION_ID');
// setup authorization
\SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);

use App\Accessory;
use App\Bicycle;
use App\Mail\OrderConfirmed;
use App\MailInfo;
use App\Package;
use App\Person;
use App\Rental;
use App\Semester;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use SquareConnect\Model\Order;

class RentalFormController extends Controller
{
    public function getRentalForm()
    {
        $bicycles = Bicycle::where('isAvailable', 1)->orderBy('price')->get();
        $accessories = Accessory::where('isAvailable', 1)->orderBy('price')->get();
        $packages = Package::where('isShopPackage', 1)->orderBy('price')->get();
        $semesters = $this->getValidSemesters();

        $lights = new Collection();
        $backs = new Collection();
        $kickstands = new Collection();
        $locks = new Collection();
        $otherAccessories = new Collection();
        $keyedAccessories = new Collection(); // maps accessory id to name
        $accessoryPrices = new Collection(); // maps accessory id to price
        $bikePrices = new Collection();
        $packagePrices = new Collection();


        foreach ($bicycles as $bike){
            $bikePrices->put($bike->id,$bike->price);
        }

        foreach ($packages as $pack){
            $packagePrices->put($pack->id,$pack->price);
        }

        foreach ($accessories as $accessory) {

            $keyedAccessories->put($accessory->id, $accessory->name);
            $accessoryPrices->put($accessory->id, $accessory->price);

            $location = $accessory->locationOnBike;

            if ($location == 'light') {
                $lights->push($accessory);
            } elseif ($location == 'back') {
                $backs->push($accessory);
            } elseif ($location == 'kickstand') {
                $kickstands->push($accessory);
            } elseif ($location == 'lock') {
                $locks->push($accessory);
            } else {
                $otherAccessories->push($accessory);
            }

        }

        return view('rentals', [
            'bicycles' => $bicycles,
            'accessories' => $accessories,
            'packages' => $packages,
            'lights' => $lights,
            'backs' => $backs,
            'kickstands' => $kickstands,
            'locks' => $locks,
            'otherAccessories' => $otherAccessories,
            'semesters' => $semesters,
            'keyedAccessories' => $keyedAccessories,
            'accessoryPrices' => $accessoryPrices,
            'bikePrices' => $bikePrices,
            'packagePrices' => $packagePrices,
        ]);
    }

    // Puts the rental form in the
    public function saveRental()
    {
        global $location_id;
        $request = request();
        $rental = new Rental();
        $person = new Person();
//        dd($request);
	//TODO check rental to make sure price is correct before saving rental or handling payment
	
        $access_token = (env('USE_PROD') == 'true') ? env('PROD_ACCESS_TOKEN')
            : env('SANDBOX_ACCESS_TOKEN');
        $location_id = (env('USE_PROD') == 'true') ? env('PROD_LOCATION_ID')
            : env('SANDBOX_LOCATION_ID');
        // setup authorization
        \SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);

        dd($request);

        //Handling package
        $packageId = null;
        if ($request['package'] == 'custom') {
            // TODO
            $package = new Package();

            $package->name = 'custom';
            $package->price = 0;  // TODO
            $package->isShopPackage = false;
            if(\request('lightSel')=='0'){
                $package->accessoryLight=null;
            }
            else $package->accessoryLight = \request('lightSel');
            if(\request('backSel')=='0') {
                $package->accessoryBack = null;
            }
            else $package->accessoryBack = \request('backSel');
            if(\request('lockSel')=='0') {
                $package->accessoryLock = null;
            }
            else $package->accessoryLock = \request('lockSel');
            if(\request('kickstandSel')=='0') {
                $package->accessoryKickstand = null;
            }
            else $package->accessoryKickstand = \request('kickstandSel');
            $otherAccessories = \request()->input('accessoryOthers');
            $position = 5;
            foreach ($otherAccessories as $otherAccessory) {
                $addon = 'accessory' . $position;
                $package->$addon = $otherAccessory;
                $position++;
            }
            $package->save();
            $package->fresh();

            $packageId = $package->id;
        } else {
            $packageId = \request('package');
        }

        //Person data
        $person->firstName = $request['fstName'];
        $person->lastName = $request['lstName'];
        $person->homePhone = $request['userHomePhone'];
        $person->homeStreetAddress = $request['userHomeAddr'];
        $person->homeCity = $request['userHomeCity'];
        $person->homeState = $request['userHomeState'];
        $person->homeZipCode = $request['userHomeZip'];
        $person->driversLicenseNumber = $request['driversLicenseNumber'];
        $person->stateOfDriversLicense = $request['stateOfDriversLicense'];
        $person->localAddress = $request['userLocalAddr'];
        $person->localPhone = $request['userLocalPhone'];
        $person->cellPhone = $request['cellPhone'];
        $person->email = $request['userEmail'];
        $person->heightInches = $request['height'];
        $person->inseam = 20;//$request['inseam'];
        $person->save();
        $person->fresh();
	
        $email=$person['email'];
        $price=$request['price'];
        //$price=(int)$price;
	//payment here
        try {
            global $location_id;
            $checkout_api = new \SquareConnect\Api\CheckoutApi();
            $request_body = new \SquareConnect\Model\CreateCheckoutRequest(
                [
                    "idempotency_key" => uniqid(),
                    "redirect_url" => "https://167.99.3.176/sendEmail",
                    "order" => [
                        "line_items" => [
                            [
                                "name" => "Bikewise Rental",
                                "quantity" => "1",
                                "base_price_money" => [
                                    // multiply by 100 due to it being in cents
                                    // uncomment amount when set up todo
                                    "amount" => intval($price/*$request["amount"]*/ * 100),
                                    "currency" => "USD"
                                ]
                            ]]
                    ],
                    "pre_populate_buyer_email"=> "$email",
                ]
            );
            $response = $checkout_api->createCheckout(/*$location_id*/
                "CBASEOBt2kqwDSXXfi12DIxN1MsgAQ", $request_body);
        } catch (Exception $e) {
            // if an error occurs, output the message
            echo $e->getMessage();
            exit();
        }

        $rental->bikeId = $request['bikeSelected'];
        $rental->accessoryListId = $packageId;
        $rental->personId = $person->id;
        $rental->gender = $request['gender'];
        $rental->dateCreated = Carbon::today();
        $rental->startDate = Carbon::parse($request['semesterStart']);
        $rental->endDate = Carbon::parse($request['semesterEnd']);
        $rental->price = 0; // TODO
        $rental->length = 'TODO'; // TODO
        $rental->isDelivered = false;
        $rental->isReturned = false;
        $rental->isPaid = false; // TODO
        $rental->frameSize = 0; // TODO
	    $rental->serialNumber = 'TODO';
	    $rental->transactionID = $response->getCheckout()->getId();
        $rental->save();
        $rental->fresh();

        
	$_SESSION['confirmation code']=$rental->transactionID;	
        $_SESSION['firstName'] = $person->firstName;
        $_SESSION['lastName'] = $person->lastName;
        $_SESSION['email'] = $person->email;
        $_SESSION['rentalId'] = $rental->id;

        // TODO get transaction ID for email
//        $_SESSION['squareId'] = $rental->id;


        // this redirects to the Square hosted checkout page
        return redirect($response->getCheckout()->getCheckoutPageUrl());
    }

    public function getTerms()
    {
        return view('terms');
    }

    public function sendEmail()
    {
        $this->writeOrderConfirmEmail(
            $_SESSION['firstName'],
            $_SESSION['lastName'],
            $_SESSION['rentalId'],
            $_SESSION['email']);
	    $_SESSION['confirmation code'];	
        return view('paymentConfirmation');
    }

    private function writeOrderConfirmEmail(string $firstName, string $lastName, string $rentalId, string $email)
    {
        Mail::to($email)->send(new OrderConfirmed(new MailInfo($firstName, $lastName, $rentalId)));
    }

    // Returns a collection of semesters that we want the user to choose from
    private function getValidSemesters(): Collection
    {
        $allSemesters = Semester::orderBy('startDate')->get();
        $validSemesters = new Collection();

        foreach ($allSemesters as $semester) {
            $semesterStart = Carbon::parse($semester->startDate);
            $semesterEnd = Carbon::parse($semester->endDate);
            $today = Carbon::today();

            if ($semesterEnd->gt($today) && $semesterStart->lt($today->addMonth(7))) {
                $validSemesters->push($semester);
            }
        }

        return $validSemesters;
    }
}
