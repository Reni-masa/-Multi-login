<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'ownertest1',
                'email' => 'ownertest1@gmail.com',
                'password' => Hash::make('password!1'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'ownertest2',
                'email' => 'ownertest2@gmail.com',
                'password' => Hash::make('password!1'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'ownertest3',
                'email' => 'ownertest3@gmail.com',
                'password' => Hash::make('password!1'),
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
