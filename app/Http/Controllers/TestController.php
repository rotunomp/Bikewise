<?php

namespace App\Http\Controllers;

use App\Bicycle;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function home()
    {
        $information = 'Hello! this is the test controller home page!';

        return view('home', [
            "information" => $information,
        ]);
    }

    public function grabRentals()
    {
        $rental = new Rental(1256, 'Tom Steger', 'FX_1');

        return view('rentals', [
            'rentalInfo' => $rental->toString(),
        ]);

    }

    public function grabBicycles()
    {
        $newBike = new Bicycle();
        $newBike->name = 'FX 02';
        $newBike->price = 399.99;
        $newBike->year = '2018';
        $newBike->save();
        $bikes = Bicycle::all();

        return view('bicycles', [
            'bikes' => $bikes,
        ]);
    }

    public function saveRental()
    {
        $request = request()->all();



        return $request;
    }



}
