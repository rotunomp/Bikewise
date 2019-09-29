<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Package::create([
            'name' => 'Test Package 1',
            'price' => 299.99,
            'isShopPackage' => true,
            'accessoryLight' => 1,
            'accessoryKickstand' => 6,
            'accessoryLock' => 8,
            'accessoryBack' => 4,
            'accessory5' => 11,
        ]);
        \App\Package::create([
            'name' => 'Test Package 2',
            'price' => 59.99,
            'isShopPackage' => true,
            'accessoryLight' => 1,
            'accessoryKickstand' => 6,
            'accessoryLock' => 8,
        ]);
        \App\Package::create([
            'name' => 'Test Package 3',
            'price' => 399.99,
            'isShopPackage' => true,
            'accessoryLight' => 2,
            'accessoryKickstand' => 7,
            'accessoryLock' => 8,
            'accessoryBack' => 5,
            'accessory5' => 12,
            'accessory6' => 13,
            'accessory7' => 14,
        ]);
        \App\Package::create([
            'name' => 'Test Package Custom',
            'price' => 99.99,
            'isShopPackage' => false,
            'accessoryLight' => 2,
            'accessoryKickstand' => 7,
            'accessoryLock' => 8,
            'accessoryBack' => 5,
            'accessory5' => 12,
        ]);
    }
}
