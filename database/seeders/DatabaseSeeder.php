<?php

use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\CustomersTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\WarhousesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([CountriesTableSeeder::class]);
        $this->call([CategoriesTableSeeder::class]);
        $this->call([CustomersTableSeeder::class]);
        $this->call([WarhousesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);

    }
}
