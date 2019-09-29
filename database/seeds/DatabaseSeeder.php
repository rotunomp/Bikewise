<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(AccessoriesTableSeeder::class);
        $this->call(BicyclesTableSeeder::class);
        $this->call(SemestersTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
    }
}
