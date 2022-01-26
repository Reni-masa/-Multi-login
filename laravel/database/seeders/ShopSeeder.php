<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'ここに店舗名が入ります1',
                'information' => 'ここに店舗情報が入ります1',
                'filename' => '',
                'is_selling' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'owner_id' => 2,
                'name' => 'ここに店舗名が入ります2',
                'information' => 'ここに店舗情報が入ります2',
                'filename' => '',
                'is_selling' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'owner_id' => 3,
                'name' => 'ここに店舗名が入ります3',
                'information' => 'ここに店舗情報が入ります3',
                'filename' => '',
                'is_selling' => false,
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
