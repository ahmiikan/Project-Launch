<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Country::factory(100)->create()->unique();

        //Seeders
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ProjectCategorySeeder::class);
        $this->call(GigCategorySeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(ExpertiseSeeder::class);
        $this->call(FreelancerSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(GigSeeder::class);

    }
}
