<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        // DB::table('logins')->insert([
        //     'name' => 'Aurora',
        //     'email' => 'aurora@gmail.com',
        //     'password' => Hash::make('123'),
        // ]);
        DB::table('logins')->insert([
            'name' => 'sara',
            'email' => 'sara@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
