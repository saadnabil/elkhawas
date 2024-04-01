<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CreateUser extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'phone' => '01143707240',
            'password' => bcrypt('123456'),
            'status' => 1,
        ]);
    }
}
