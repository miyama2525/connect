<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmergencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            DB::table('emergencies')->insert(
                [
                    'title'=>'テストタイトル - ',
                    'body' =>"テストお知らせ\nテストお知らせ\nテストお知らせ - ",
                ],
            );

            DB::table('emergencies')->insert(
                [
                    'title'=>'テストタイトル - 2',
                    'body' =>"テストお知らせ\nテストお知らせ\nテストお知らせ - 2",
                ],
            );

            DB::table('emergencies')->insert(
                [
                    'title'=>'テストタイトル - 3',
                    'body' =>"テストお知らせ\nテストお知らせ\nテストお知らせ - 3",
                ],
            );
            
            
    }
}
