<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('absences')->insert([
            'reason_id' => '1',
            'other' => null,
            'ab_date' => '2023-04-12',
            'user_id' => '3'
        ]);
        DB::table('absences')->insert([
            'reason_id' => null,
            'other' => 'おたより',
            'ab_date' => '2023-04-16',
            'user_id' => '3'
        ]);
        DB::table('absences')->insert([
            'reason_id' => '1',
            'other' => 'おたより',
            'ab_date' => '2023-04-19',
            'user_id' => '3'
        ]);
    }
}
