<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('grade_categories')->insert([
            'id' => 1,
            'grade_name' => '未満児(１歳)',
        ]);
        DB::table('grade_categories')->insert([
            'id' => 2,
            'grade_name' => '未満児(２歳)',
        ]);
        DB::table('grade_categories')->insert([
            'id' => 3,
            'grade_name' => '年少',
        ]);
        DB::table('grade_categories')->insert([
            'id' => 4,
            'grade_name' => '年中',
        ]);
        DB::table('grade_categories')->insert([
            'id' => 5,
            'grade_name' => '年長',
        ]);
    }
}
