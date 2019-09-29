<?php

use Illuminate\Database\Seeder;

class BicyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Bicycle::create([
            'name' => '820',
            'price' => 399.99,
            'bikeType' => 'mountain',
            'year' => '2018',
            'manufacturer' => 'Trek',
            'isAvailable' => true,
        ]);
    }
}
