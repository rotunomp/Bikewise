<?php

use Illuminate\Database\Seeder;

class AccessoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Accessory::create([
            'name' => 'light 1',
            'price' => '0',
            'isAvailable' => true,
            'locationOnBike' => 'light'
        ]);

        \App\Accessory::create([
            'name' => 'light 2',
            'price' => '20',
            'isAvailable' => true,
            'locationOnBike' => 'light'
        ]);

        \App\Accessory::create([
            'name' => 'light 3',
            'price' => '30',
            'isAvailable' => true,
            'locationOnBike' => 'light'
        ]);

        \App\Accessory::create([
            'name' => 'back 1',
            'price' => '20',
            'isAvailable' => true,
            'locationOnBike' => 'back'
        ]);

        \App\Accessory::create([
            'name' => 'back 2',
            'price' => '100',
            'isAvailable' => true,
            'locationOnBike' => 'back'
        ]);

        \App\Accessory::create([
            'name' => 'kickstand 1',
            'price' => '35',
            'isAvailable' => true,
            'locationOnBike' => 'front'
        ]);

        \App\Accessory::create([
            'name' => 'kickstand 2',
            'price' => '115',
            'isAvailable' => true,
            'locationOnBike' => 'front'
        ]);

        \App\Accessory::create([
            'name' => 'lock 1',
            'price' => '10',
            'isAvailable' => true,
            'locationOnBike' => 'lock'
        ]);

        \App\Accessory::create([
            'name' => 'lock 2',
            'price' => '30',
            'isAvailable' => true,
            'locationOnBike' => 'lock'
        ]);

        \App\Accessory::create([
            'name' => 'lock 3',
            'price' => '50',
            'isAvailable' => true,
            'locationOnBike' => 'lock'
        ]);

        \App\Accessory::create([
            'name' => 'other 1',
            'price' => '30',
            'isAvailable' => true,
            'locationOnBike' => 'other'
        ]);

        \App\Accessory::create([
            'name' => 'other 2',
            'price' => '10',
            'isAvailable' => true,
            'locationOnBike' => 'other'
        ]);

        \App\Accessory::create([
            'name' => 'other 3',
            'price' => '100',
            'isAvailable' => true,
            'locationOnBike' => 'other'
        ]);

        \App\Accessory::create([
            'name' => 'other 4',
            'price' => '5',
            'isAvailable' => true,
            'locationOnBike' => 'other'
        ]);

    }
}
