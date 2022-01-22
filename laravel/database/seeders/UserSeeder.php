<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'usertest1',
                'email' => 'usertest1@gmail.com',
                'password' => Hash::make('password!1'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'usertest2',
                'email' => 'usertest2@gmail.com',
                'password' => Hash::make('password!1'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'usertest3',
                'email' => 'usertest3@gmail.com',
                'password' => Hash::make('password!1'),
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
