<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Bicycle;
use App\Package;
use App\Person;
use App\Rental;
use App\Semester;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class databaseEditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getMainDatabasePage() {
        return view('databaseHome');
    }

    public function getBikeDatabasePage()
    {
        $bicycles = Bicycle::all();

        return view('databaseBicycles', [
            'bicycles' => $bicycles,
        ]);
    }

    public function storeBicycle()
    {
        $bicycle = new Bicycle();
        $bicycle->name = \request('name');
        $bicycle->price = \request('price');
        $bicycle->bikeType = \request('bikeType');
        $bicycle->year = \request('year');
        $bicycle->manufacturer = \request('manufacturer');
        $bicycle->isAvailable = \request('isAvailable');
        $bicycle->description=\request('description');

//        dd(\request());

        if(Input::hasFile('pictureFileName')){

            $file = Input::file('pictureFileName');

            $file->move('images', $file->getClientOriginalName());

            $bicycle->pictureFileName = $file->getClientOriginalName();
        }


        $bicycle->save();

        $bicycles = Bicycle::all();

        return view('databaseBicycles', [
            'bicycles' => $bicycles,
        ]);
    }

    public function deleteBicycle($id)
    {
        Bicycle::destroy($id);

        return redirect('/database/bicycles');
    }

    public function getBikeEditPage($id)
    {
        $bikeToEdit = Bicycle::find($id);

        return view('databaseBicycleEdit', [
            'bicycle' => $bikeToEdit,
        ]);
    }

    public function editBicycle($id)
    {
        $bikeToEdit = Bicycle::find($id);

        $bikeToEdit->name = \request('name');
        $bikeToEdit->price = \request('price');
        $bikeToEdit->bikeType = \request('bikeType');
        $bikeToEdit->year = \request('year');
        $bikeToEdit->manufacturer = \request('manufacturer');
        $bikeToEdit->isAvailable = \request('isAvailable');
        $bikeToEdit->description = \request('description');

        if(Input::hasFile('pictureFileName')){

            $file = Input::file('pictureFileName');

            $file->move('images', $file->getClientOriginalName());

            $bikeToEdit->pictureFileName = $file->getClientOriginalName();
        }

        $bikeToEdit->save();

        return redirect('/database/bicycles');

    }

    public function getPersonDatabasePage()
    {
        $people = Person::all();

        return view('databasePeople', [
            'people' => $people,
        ]);
    }

    public function storePerson()
    {
        $person = new Person();
        $person->lastName = \request('lastName');
        $person->firstName = \request('firstName');
        $person->homePhone = \request('homePhone');
        $person->homeStreetAddress = \request('homeStreetAddress');
        $person->homeCity = \request('homeCity');
        $person->homeState = \request('homeState');
        $person->homeZipCode = \request('homeZipCode');
        $person->driversLicenseNumber = \request('driversLicenseNumber');
        $person->stateOfDriversLicense = \request('stateOfDriversLicense');
        $person->localAddress = \request('localAddress');
        $person->cellPhone = \request('cellPhone');
        $person->email = \request('email');
        $person->heightInches = \request('heightInches');
        $person->inseam = \request('inseam');

        $person->save();

        $people = Person::all();

        return view('databasePeople', [
            'people' => $people,
        ]);


    }

    public function deletePerson($id)
    {
        Person::destroy($id);

        return redirect('/database/people');
    }

    public function getPersonEditPage($id)
    {
        $personToEdit = Person::find($id);

        return view('databasePersonEdit', [
            'person' => $personToEdit,
        ]);
    }

    public function editPerson($id)
    {
        $personToEdit = Person::find($id);

        $personToEdit->lastName = \request('lastName');
        $personToEdit->firstName = \request('firstName');
        $personToEdit->homePhone = \request('homePhone');
        $personToEdit->homeStreetAddress = \request('homeStreetAddress');
        $personToEdit->homeCity = \request('homeCity');
        $personToEdit->homeState = \request('homeState');
        $personToEdit->homeZipCode = \request('homeZipCode');
        $personToEdit->driversLicenseNumber = \request('driversLicenseNumber');
        $personToEdit->stateOfDriversLicense = \request('stateOfDriversLicense');
        $personToEdit->localAddress = \request('localAddress');
        $personToEdit->cellPhone = \request('cellPhone');
        $personToEdit->email = \request('email');
        $personToEdit->heightInches = \request('heightInches');
        $personToEdit->inseam = \request('inseam');
        $personToEdit->save();

        return redirect('/database/bicycles');

    }

    public function getAccessoryDatabasePage()
    {
        $accessories = Accessory::all();

        return view('databaseAccessories', [
            'accessories' => $accessories,
        ]);
    }

    public function storeAccessory()
    {
        $accessory = new Accessory();

        $accessory->name = \request('name');
        $accessory->price = \request('price');
        $accessory->isAvailable = \request('isAvailable');
        $accessory->locationOnBike = \request('locationOnBike');
        $accessory->pictureFileName = \request('pictureFileName');

        $accessory->save();

        return view('databaseAccessories', [
            'accessories' => Accessory::all(),
        ]);
    }

    public function deleteAccessory($id)
    {
        Accessory::destroy($id);

        return redirect('/database/accessories');
    }

    public function getAccessoryEditPage($id)
    {
        $accessoryToEdit = Accessory::find($id);

        return view('databaseAccessoryEdit', [
            'accessory' => $accessoryToEdit,
        ]);
    }

    public function editAccessory($id)
    {
        $accessoryToEdit = Accessory::find($id);

        $accessoryToEdit->name = \request('name');
        $accessoryToEdit->price = \request('price');
        $accessoryToEdit->isAvailable = \request('isAvailable');
        $accessoryToEdit->locationOnBike = \request('locationOnBike');
        $accessoryToEdit->pictureFileName = \request('pictureFileName');
        $accessoryToEdit->save();

        return redirect('/database/accessories');

    }

    public function getRentalDatabasePage()
    {
        $rentals = Rental::all();
        $bicycles = Bicycle::all();
        $packages = Package::all();
        $people = Person::all();

        $keyedBicycles = new Collection();
        $keyedPackages = new Collection();
        $keyedPeople = new Collection();

        // Map names to ids so we can see the package, person, and bike names in the blade
        foreach($bicycles as $bicycle) {
            $keyedBicycles->put($bicycle->id, $bicycle->name);
        }

        foreach($packages as $package) {
            $keyedPackages->put($package->id, $package->name);
        }

        foreach($people as $person) {
            $keyedPeople->put($person->id, $person->firstName . ' ' . $person->lastName);
        }


        return view('databaseRentals', [
            'rentals' => $rentals,
            'keyedBicycles' => $keyedBicycles,
            'keyedPackages' => $keyedPackages,
            'keyedPeople' => $keyedPeople,
        ]);
    }

    public function getUnpaidRentalDatabasePage()
    {
        $rentals = Rental::where('isPaid', 0)->get();
        $bicycles = Bicycle::all();
        $packages = Package::all();
        $people = Person::all();

        $keyedBicycles = new Collection();
        $keyedPackages = new Collection();
        $keyedPeople = new Collection();

        // Map names to ids so we can see the package, person, and bike names in the blade
        foreach($bicycles as $bicycle) {
            $keyedBicycles->put($bicycle->id, $bicycle->name);
        }

        foreach($packages as $package) {
            $keyedPackages->put($package->id, $package->name);
        }

        foreach($people as $person) {
            $keyedPeople->put($person->id, $person->firstName . ' ' . $person->lastName);
        }


        return view('databaseUnpaidRentals', [
            'rentals' => $rentals,
            'keyedBicycles' => $keyedBicycles,
            'keyedPackages' => $keyedPackages,
            'keyedPeople' => $keyedPeople,
        ]);
    }

    public function getUndeliveredRentalDatabasePage()
    {
        $rentals = Rental::where('isDelivered', 0)->get();
        $bicycles = Bicycle::all();
        $packages = Package::all();
        $people = Person::all();

        $keyedBicycles = new Collection();
        $keyedPackages = new Collection();
        $keyedPeople = new Collection();

        // Map names to ids so we can see the package, person, and bike names in the blade
        foreach($bicycles as $bicycle) {
            $keyedBicycles->put($bicycle->id, $bicycle->name);
        }

        foreach($packages as $package) {
            $keyedPackages->put($package->id, $package->name);
        }

        foreach($people as $person) {
            $keyedPeople->put($person->id, $person->firstName . ' ' . $person->lastName);
        }


        return view('databaseUndeliveredRentals', [
            'rentals' => $rentals,
            'keyedBicycles' => $keyedBicycles,
            'keyedPackages' => $keyedPackages,
            'keyedPeople' => $keyedPeople,
        ]);
    }

    public function getUnreturnedRentalDatabasePage()
    {
        $rentals = Rental::where('isReturned', 0)->get();
        $bicycles = Bicycle::all();
        $packages = Package::all();
        $people = Person::all();

        $keyedBicycles = new Collection();
        $keyedPackages = new Collection();
        $keyedPeople = new Collection();

        // Map names to ids so we can see the package, person, and bike names in the blade
        foreach($bicycles as $bicycle) {
            $keyedBicycles->put($bicycle->id, $bicycle->name);
        }

        foreach($packages as $package) {
            $keyedPackages->put($package->id, $package->name);
        }

        foreach($people as $person) {
            $keyedPeople->put($person->id, $person->firstName . ' ' . $person->lastName);
        }


        return view('databaseUnreturnedRentals', [
            'rentals' => $rentals,
            'keyedBicycles' => $keyedBicycles,
            'keyedPackages' => $keyedPackages,
            'keyedPeople' => $keyedPeople,
        ]);
    }

    public function getRentalEditPage($id)
    {
        $rentalToEdit = Rental::find($id);

        return view('databaseRentalEdit', [
            'rental' =>$rentalToEdit,
        ]);
    }

    public function editRental($id)
    {
        $bikeToEdit = Rental::find($id);

        $bikeToEdit->bikeId = \request('bikeId');
        $bikeToEdit->accessoryListId = \request('accessoryListId');
        $bikeToEdit->personId = \request('personId');
        $bikeToEdit->price = \request('price');
        $bikeToEdit->isDelivered = \request('isDelivered');
        $bikeToEdit->isReturned = \request('isReturned');
        $bikeToEdit->isPaid = \request('isPaid');
        $bikeToEdit->save();

        return redirect('/database/rentals');

    }

    public function getPackageDatabasePage()
    {
        $packages = Package::all();
        $accessories = Accessory::all();

        $keyedAccessories = new Collection();

        // New collection which maps accessory key to name so we get the names in the blade
        foreach($accessories as $accessory) {
            $keyedAccessories->put($accessory->id, $accessory->name);
        }

        return view('databasePackages', [
            'packages' => $packages,
            'keyedAccessories' => $keyedAccessories,
        ]);
    }

    public function getPackageCreatorPage()
    {
        $accessories = Accessory::all();

        $lights = new Collection();
        $backs = new Collection();
        $kickstands = new Collection();
        $locks = new Collection();
        $otherAccessories = new Collection();

        foreach ($accessories as $accessory) {

            $location  = $accessory->locationOnBike;

            if ($location == 'light') {
                $lights->push($accessory);
            }
            elseif ($location == 'back') {
                $backs->push($accessory);
            }
            elseif ($location == 'kickstand') {
                $kickstands->push($accessory);
            }
            elseif ($location == 'lock') {
                $locks->push($accessory);
            }
            else {
                $otherAccessories->push($accessory);
            }

        }

        return view('databasePackageCreator', [
            'accessories' => $accessories,
            'lights' => $lights,
            'backs' => $backs,
            'kickstands' => $kickstands,
            'locks' => $locks,
            'otherAccessories' => $otherAccessories,
        ]);

    }

    public function storePackage()
    {
        $package = new Package();

        $package->name = \request('name');
        $package->price = \request('price');
        $package->description=\request('description');
        $package->isShopPackage = \request('isShopPackage');
        $package->accessoryLight = \request('accessoryLight');
        $package->accessoryBack = \request('accessoryBack');
        $package->accessoryLock = \request('accessoryLock');
        $package->accessoryKickstand = \request('accessoryKickstand');

        $otherAccessories = \request()->input('accessoryOthers');

        $position = 5;
        foreach ($otherAccessories as $otherAccessory) {
            $addon = 'accessory' . $position;
            $package->$addon = $otherAccessory;
            $position++;
        }

        $package->save();

        return redirect('/database/packages');
    }

    // TODO
    public function getPackageEditPage($id)
    {

        $packageToEdit = Package::find($id);

        $accessories = Accessory::all();

        $lights = new Collection();
        $backs = new Collection();
        $kickstands = new Collection();
        $locks = new Collection();
        $otherAccessories = new Collection();

        foreach ($accessories as $accessory) {

            $location  = $accessory->locationOnBike;

            if ($location == 'light') {
                $lights->push($accessory);
            }
            elseif ($location == 'back') {
                $backs->push($accessory);
            }
            elseif ($location == 'kickstand') {
                $kickstands->push($accessory);
            }
            elseif ($location == 'lock') {
                $locks->push($accessory);
            }
            else {
                $otherAccessories->push($accessory);
            }

        }

        $packageAccessories = new Collection();
        $temp = [
            $packageToEdit->accessory5,
            $packageToEdit->accessory6,
            $packageToEdit->accessory7,
            $packageToEdit->accessory8,
            $packageToEdit->accessory9,
            $packageToEdit->accessory10,
            $packageToEdit->accessory11,
            $packageToEdit->accessory12,
            $packageToEdit->accessory13,
            $packageToEdit->accessory14,
            $packageToEdit->accessory15,
        ];

        foreach ($temp as $item) {
            if($item) {
                $packageAccessories->push($item);
            }
        }

        return view('databasePackageEdit', [
            'package' => $packageToEdit,
            'accessories' => $accessories,
            'lights' => $lights,
            'backs' => $backs,
            'kickstands' => $kickstands,
            'locks' => $locks,
            'otherAccessories' => $otherAccessories,
            'packageAccessories' => $packageAccessories,
        ]);

    }

    public function editPackage($id)
    {

        $package = Package::find($id);

        $package->name = \request('name');
        $package->price = \request('price');
        $package->description=\request('description');
        $package->isShopPackage = \request('isShopPackage');
        $package->accessoryLight = \request('accessoryLight');
        $package->accessoryBack = \request('accessoryBack');
        $package->accessoryLock = \request('accessoryLock');
        $package->accessoryKickstand = \request('accessoryKickstand');
        $package->accessory5 = \request('accessory5');
        $package->accessory6 = \request('accessory6');
        $package->accessory7 = \request('accessory7');
        $package->accessory8 = \request('accessory8');
        $package->accessory9 = \request('accessory9');
        $package->accessory10 = \request('accessory10');
        $package->accessory11 = \request('accessory11');
        $package->accessory12 = \request('accessory12');
        $package->accessory13 = \request('accessory13');
        $package->accessory14 = \request('accessory14');
        $package->accessory15 = \request('accessory15');
        $package->save();

        return redirect('/database/packages');

    }

    public function deletePackage($id)
    {
        Package::destroy($id);

        return redirect('/database/packages');

    }

    public function getPackageDetailPage($id)
    {
        $package = Package::find($id);
        $accessories = Accessory::all();
        $keyedAccessories = new Collection();

        // New collection which maps accessory key to name so we get the names in the blade
        foreach($accessories as $accessory) {
            $keyedAccessories->put($accessory->id, $accessory->name);
        }


        return view('databasePackageDetail', [
            'package' => $package,
            'keyedAccessories' => $keyedAccessories,
        ]);
    }

    public function getSemesterDatabasePage()
    {
        $semesters = Semester::all();

        return view('databaseSemesters', [
            'semesters' => $semesters,
        ]);
    }

    public function storeSemester()
    {
        $semester = new Semester();

        $semester->year = \request('year');
        $semester->season = \request('season');
        $semester->startDate = Carbon::parse(\request('startDate'));
        $semester->endDate = Carbon::parse(\request('endDate'));

        $semester->save();

        return view('databaseSemesters', [
            'semesters' => Semester::all(),
        ]);
    }

    public function deleteSemester($id)
    {
        Semester::destroy($id);

        return redirect('/database/accessories');
    }

    public function getSemesterEditPage($id)
    {
        $semesterToEdit = Semester::find($id);

        return view('databaseSemesterEdit', [
            'semester' => $semesterToEdit,
        ]);
    }

    public function editSemester($id)
    {
        $semesterToEdit = Semester::find($id);

        $semesterToEdit->year = \request('year');
        $semesterToEdit->season = \request('season');
        $semesterToEdit->startDate = Carbon::parse(\request('startDate'));
        $semesterToEdit->endDate = Carbon::parse(\request('endDate'));
        $semesterToEdit->save();

        return redirect('/database/semesters');

    }


    public function getUserDatabasePage()
    {
        $users = User::all();

        return view('databaseUsers', [
            'users' => $users,
        ]);
    }

    public function storeUser()
    {
        $user = new User();

        $user->name = \request('name');
        $user->email = \request('email');
        $user->password = Hash::make(\request('password'));

        $user->save();

        return view('databaseUsers', [
            'users' => User::all(),
        ]);

    }
}
