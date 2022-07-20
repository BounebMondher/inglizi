<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Mondher',
            'last_name' => 'Bouneb',
            'email' => 'bounebmondher@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('helamour'),
            'created_at' => now(),
            'updated_at' => now(),
            'phone' => '27122392',
            'type' => 'admin'
        ]);
    }
}
