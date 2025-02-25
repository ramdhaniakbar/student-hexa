<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'Muhamad Ramdhani Akbar',
                'email' => 'ramdhaniakbar@gmail.com',
                'password' => bcrypt('admin@123'),
                'profile_image' => null,
                'role' => 'Admin',
            ],
            [
                'name' => 'Gonalu Kaler',
                'email' => 'gonalukaler@gmail.com',
                'password' => bcrypt('kaler@123'),
                'profile_image' => null,
                'role' => 'Teacher',
            ],
            [
                'name' => 'Udin GG',
                'email' => 'udingg@gmail.com',
                'password' => bcrypt('udin@123'),
                'profile_image' => null,
                'role' => 'Student',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'password' => bcrypt('eren@123'),
                'profile_image' => null,
                'role' => 'Student',
            ],
            [
                'name' => 'Jane Dun',
                'email' => 'janedun@gmail.com',
                'password' => bcrypt('mikasa@123'),
                'profile_image' => null,
                'role' => 'Student',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
