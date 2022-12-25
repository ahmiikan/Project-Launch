<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['role_name' => 'Admin', 'created_at' => now()],
            ['role_name' => 'Freelancer', 'created_at' => now()],
            ['role_name' => 'Client', 'created_at' => now()]
        ]);
    }
}
