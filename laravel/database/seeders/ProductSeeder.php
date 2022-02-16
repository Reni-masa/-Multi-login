<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => '黒デニム',
                'contents' => '職人がこだわって制作した黒デニムです',
                'imageName' => null,
                'shop_id' => 1,
                'secondary_category_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'ダメージデニム',
                'contents' => 'ほどよいダメージで男らしさを演出するダメージデニムです',
                'imageName' => null,
                'shop_id' => 1,
                'secondary_category_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'MA1',
                'contents' => '人気急上昇ma1',
                'imageName' => null,
                'shop_id' => 1,
                'secondary_category_id' => 2,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
