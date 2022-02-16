<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\OwnerSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PrimaryCategorySeeder;
use Database\Seeders\SecondaryCategorySeeder;

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
            PrimaryCategorySeeder::class,
            SecondaryCategorySeeder::class,
        ]);
    }
}
