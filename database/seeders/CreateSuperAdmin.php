<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@khawas.com',
            'phone' => '01143707240',
            'password' => bcrypt('123456'),
            'status' => 1,
            'birthdate' => '1995-05-05',
            'country_id' => 1,
            'address' => 'fdfdgf fg fg f',
            'phone' => '+20 1156466662',
        ]);
    }
}
