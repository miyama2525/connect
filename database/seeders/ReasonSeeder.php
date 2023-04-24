<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reasons')->insert([
            'id' => 1,
            'reason_name' => '熱',
        ]);
        DB::table('reasons')->insert([
            'id' => 2,
            'reason_name' => '風邪症状',
        ]);
        DB::table('reasons')->insert([
            'id' => 3,
            'reason_name' => '感染症',
        ]);
        DB::table('reasons')->insert([
            'id' => 4,
            'reason_name' => 'おうちの用事',
        ]);
        DB::table('reasons')->insert([
            'id' => 5,
            'reason_name' => 'その他',
        ]);
    }
}
