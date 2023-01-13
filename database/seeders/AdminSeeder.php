<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'phone' => '5675473',
                'password' => '123456',
                'role' => 'admin'
            ],[
                'name' => 'Ahmed',
                'email' => 'ahmed@ahmed.com',
                'phone' => '4365346345',
                'password' => '123456',
                'role' => 'admin'
            ],[
                'name' => 'Ali',
                'email' => 'ali@ali.com',
                'phone' => '56534656',
                'password' => '123456',
                'role' => 'admin'
            ]
        ];

        foreach ($users as $user)
        User::create($user);
    }
}
