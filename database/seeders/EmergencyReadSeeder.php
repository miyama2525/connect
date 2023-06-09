<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmergencyReadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        DB::table('emergency_reads')->insert(
            [
                'user_id' => 3,
                'emergency_id' => 1,
            ],
        );

        DB::table('emergency_reads')->insert(
            [
                'user_id' => 3,
                'emergency_id' => 2,
            ],
        );

        DB::table('emergency_reads')->insert(
            [
                'user_id' => 3,
                'emergency_id' => 3,
            ],
        );
    }
}
