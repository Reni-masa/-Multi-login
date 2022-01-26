<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\OwnerSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            OwnerSeeder::class,
            ShopSeeder::class,
        ]);
    }
}
