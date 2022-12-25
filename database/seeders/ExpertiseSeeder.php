<?php

namespace Database\Seeders;

use App\Models\Expertise;
use Illuminate\Database\Seeder;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expertises = ['Graphic & Design', 'Digital Marketing', 'Wrting & Translation', 'Video & Animation', 'Music & Audio', 'Programming & Tech', 'Data Analyst', 'Photographer', 'Content Writer', 'Video Editor', 'Audio Editor', 'Resume Designer', 'Illustrator'];
        foreach ($expertises as $expertise) {
            Expertise::create(['name' => $expertise]);
        }
    }
}
