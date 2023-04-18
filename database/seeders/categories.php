<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            'id' => 1,
            'category_name' => 'おたより',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'category_name' => '今月スケジュール',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'category_name' => '年間スケジュール',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'category_name' => 'おすすめ献立',
        ]);
    }
}
