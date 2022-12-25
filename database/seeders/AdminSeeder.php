<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
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
        $countries = Country::all()->random(1);
        $admin = User::create([
            'image' => '20220822071045.jpg',
            'first_name' => 'Admin',
            'last_name' => 'test',
            'password' => '12345678',
            'email' => 'admin@gmail.com',
            'country_id' => '3',
            'gender' => 'Male',
        ]);
        $admin->roles()->attach(1);

    }
}
