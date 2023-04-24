<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('children')->insert(
            [
                'id' => 1,
                'child_name' => "子供１",
                'birthday' => "6月1日",
                'grade_id' => 1,
                'user_id' => 3
            ],
        );

        DB::table('children')->insert(
            [
                'id' => 2,
                'child_name' => "子供2",
                'birthday' => "12月11日",
                'grade_id' => 5,
                'user_id' => 4
            ],
        );

        DB::table('children')->insert(
            [
                'id' => 3,
                'child_name' => "子供3",
                'birthday' => "1月17日",
                'grade_id' => 3,
                'user_id' => 4
            ],
        );

        DB::table('children')->insert(
            [
                'id' => 4,
                'child_name' => "子供4",
                'birthday' => "8月1日",
                'grade_id' => 1,
                'user_id' => 4
            ],
        );
    }
}
