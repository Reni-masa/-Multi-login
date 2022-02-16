<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'ファッション',
                'sort_order' => 1,
            ],
            [
                'name' => '書籍',
                'sort_order' => 2,
            ],
            [
                'name' => 'デスク・ガジェット',
                'sort_order' => 3,
            ],
        ]);
    }
}
