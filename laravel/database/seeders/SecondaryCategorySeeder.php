<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecondaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secondary_categories')->insert([
            [
                'name' => 'ボトム',
                'sort_order' => 1,
                'primary_categories_id' => 1,
            ],
            [
                'name' => 'アウター',
                'sort_order' => 2,
                'primaty_categories_id' => 1,
            ],
            [
                'name' => 'Tシャツ',
                'sort_order' => 3,
                'primaty_categories_id' => 1,
            ],
            [
                'name' => '漫画',
                'sort_order' => 1,
                'primaty_categories_id' => 2,
            ],
            [
                'name' => 'ビジネス書',
                'sort_order' => 2,
                'primaty_categories_id' => 2,
            ],
            [
                'name' => 'モニター',
                'sort_order' => 1,
                'primaty_categories_id' => 3,
            ],
            [
                'name' => 'デスク',
                'sort_order' => 2,
                'primaty_categories_id' => 3,
            ],
            [
                'name' => 'キーボード',
                'sort_order' => 3,
                'primaty_categories_id' => 3,
            ],

        ]);
    }
}
