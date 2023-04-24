<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'email'=>'teacher@test.com',
                'password' => \Hash::make('teacher1'),
                'email_verified_at' =>'2023-04-16 16:41:31',
                'role'=>'1',//先生
            ],
        );

        DB::table('users')->insert(
            [
                'email'=>'guardian@test.com',
                'password' => \Hash::make('guardian'),
                'email_verified_at' =>'2023-04-16 16:41:31',
                'role'=>'11',//保護者
            ],
        );

        DB::table('users')->insert(
            [
                'email'=>'guardian2@test.com',
                'password' => \Hash::make('guardian2'),
                'email_verified_at' =>'2023-04-16 16:41:31',
                'role'=>'11',//保護者2
            ],
        );

        DB::table('users')->insert(
            [
                'email'=>'guardian3@test.com',
                'password' => \Hash::make('guardian3'),
                'email_verified_at' =>'2023-04-16 16:41:31',
                'role'=>'11',//保護者
            ],
        );
        
    }
}
