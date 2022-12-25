<?php

namespace Database\Seeders;

use App\Models\GigCategory;
use Illuminate\Database\Seeder;

class GigCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gigCategories = ['Logo Design', 'Web Design', 'Web Development', 'Mobile Development', 'Digital Marketing', 'SEO', 'Social Media', 'Photography', 'Video Production', '3D Animation', 'Motion Graphics', 'Copywriting', 'Content Writing', 'Translation', 'Video Editing', 'Audio Editing', '3D Modeling', '3D Rendering', '3D Animation', '3D Modelling', 'Resume Design', 'Illustration', 'NFT Art', 'Pattern Design', 'Poster Design', 'Flyer Design', 'Book Design', 'PODCAST Cover Art', 'Packaging and Label Design', 'Storyboards', 'Social Media Design', 'Menu Design', 'Invitation Design', 'Cartoon & Comics'];
        foreach ($gigCategories as $gigCategory) {
            GigCategory::create(['name' => $gigCategory]);
        }
    }
}
