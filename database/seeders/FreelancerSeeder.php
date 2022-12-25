<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
use App\Models\SkillTag;
use App\Models\Expertise;
use App\Models\Freelancer;
use Illuminate\Database\Seeder;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FREELANCER_ROLE_ID = 2;
        $expertise = Expertise::all();
        $skills = SkillTag::all();

        $firstName = ['Freelancer', 'Ahmad', 'Arslan', 'Rizwan', 'Timothy', 'Judy', 'Amanda', 'Ronald', 'Antonio', 'Helen', 'Christine', 'Ronald', 'Jordan', 'Angela', 'Linda', 'Mario', 'Christine', 'Maria', 'Thomas', 'Vernon', 'Linda', 'Mark', 'Henry', 'Christopher', 'Kelly', 'Connie', 'Joe', 'Raymond', 'Melanie', 'Ashley', 'Angela', 'Laura', 'Justin', 'Gabrielle', 'Patricia', 'Amy', 'Daniel', 'Kyle', 'Jeffrey', 'Susan', 'James', 'Nicole', 'Matthew', 'Sherri', 'Todd', 'Jeffery', 'Michael', 'Jeffrey', 'Jerry', 'Diane', 'Karen', 'Roy', 'Jessica', 'Dana', 'Francisco', 'Rhonda', 'Amber', 'Marcia', 'Lisa', 'Kevin', 'Joseph', 'Jeffrey', 'Joann', 'Anna', 'Jesse', 'Maria', 'Larry', 'Rachel', 'Andrea', 'John', 'Jared', 'Jamie', 'Yolanda', 'Christy', 'Amy', 'Melissa', 'John', 'John', 'James', 'Christina', 'Amy', 'Nicole', 'Tracy', 'Monica', 'Jasmin', 'Hannah', 'John', 'Leah', 'Dwayne', 'Michael', 'James', 'Amanda', 'Danny', 'Dawn', 'Adam', 'David', 'Bryan', 'Casey', 'Zachary', 'Richard', 'Matthew', 'Russell', 'Stephen', 'Kara', 'Alexander', 'Rachel', 'Timothy', 'Matthew', 'Juan', 'Lisa', 'Theresa', 'Scott', 'Kimberly', 'Christine', 'Heather', 'Lance', 'Alexander', 'Erin', 'Todd', 'Vanessa', 'Nicole', 'Katherine', 'Tracy', 'Stephanie', 'Penny', 'Rebecca', 'Craig', 'Karen', 'Malik', 'Crystal', 'Caitlyn', 'Joshua', 'Cory', 'Rebecca', 'David', 'Robert', 'Michelle', 'Robert', 'Rachel', 'Alyssa', 'Amanda', 'Elizabeth', 'Tara', 'Samuel', 'Marcus', 'Nicholas', 'Laurie', 'Amber'];
        $secondName = ['Tester', 'Ajlal', 'Sabir', 'Waheed', 'Mcpherson', 'Hamilton', 'Gill', 'Wilson', 'Oneill', 'Brown', 'Parker', 'Yates', 'Cruz', 'Logan', 'Johnson', 'Holloway', 'Lee', 'Maxwell', 'French', 'Gregory', 'Thompson', 'Reed', 'Strong', 'Simmons', 'Robinson', 'Snyder', 'Henderson', 'Martinez', 'Powell', 'Chavez', 'Nguyen', 'Parker', 'Oneill', 'Mitchell', 'Lang', 'King', 'Hernandez', 'Owens', 'Long', 'Ware', 'Ward', 'Stokes', 'Odom', 'Osborne', 'Ferguson', 'Baker', 'Campbell', 'Hull', 'Jimenez', 'Brown', 'Moore', 'Douglas', 'Winters', 'Newton', 'Jackson', 'Henderson', 'Hernandez', 'Long', 'Dixon', 'Davis', 'Werner', 'Wright', 'Fisher', 'Ramirez', 'Ortega', 'Johnson', 'Bradley', 'Murphy', 'Evans', 'Hill', 'Smith', 'Leblanc', 'Juarez', 'Burke', 'Cooper', 'Williams', 'Miller', 'Kidd', 'Parker', 'Rios', 'Walton', 'Welch', 'Schroeder', 'Brown', 'Jones', 'Garrett', 'Jones', 'Taylor', 'Romero', 'Stout', 'Ho', 'Foster', 'Berger', 'Nguyen', 'Craig', 'Wong', 'Mcbride', 'Miller', 'Boyd', 'Brown', 'Taylor', 'Rogers', 'Vazquez', 'Wells', 'Brown', 'Ward', 'Smith', 'Walters', 'Gonzales', 'Avila', 'Valdez', 'Clark', 'Fuentes', 'Bond', 'Salinas', 'Campbell', 'Hampton', 'Martin', 'Johnson', 'Avila', 'Peterson', 'Mcintosh', 'Nichols', 'Williams', 'Kirby', 'Mcdaniel', 'Turner', 'Finley', 'Knapp', 'Ross', 'Ballard', 'Collins', 'Nicholson', 'Lee', 'Thomas', 'Whitehead', 'Dunn', 'Gray', 'Stevenson', 'Richards', 'Yates', 'Ross', 'Anderson', 'Davidson', 'Kelly', 'Collins', 'Escobar', 'Bowen'];
        $gmail = ['freelancer@gmail.com', 'ahmad@gmail.com', 'arslan@gmail.com', 'rizwan@gmail.com', 'timothymcpherson@gmail.com', 'judyhamilton@gmail.com', 'amandagill@gmail.com', 'ronaldwilson@gmail.com', 'antoniooneill@gmail.com', 'helenbrown@gmail.com', 'christineparker@gmail.com', 'ronaldyates@gmail.com', 'jordancruz@gmail.com', 'angelalogan@gmail.com', 'lindajohnson@gmail.com', 'marioholloway@gmail.com', 'christinelee@gmail.com', 'mariamaxwell@gmail.com', 'thomasfrench@gmail.com', 'vernongregory@gmail.com', 'lindathompson@gmail.com', 'markreed@gmail.com', 'henrystrong@gmail.com', 'christophersimmons@gmail.com', 'kellyrobinson@gmail.com', 'conniesnyder@gmail.com', 'joehenderson@gmail.com', 'raymondmartinez@gmail.com', 'melaniepowell@gmail.com', 'ashleychavez@gmail.com', 'angelanguyen@gmail.com', 'lauraparker@gmail.com', 'justinoneill@gmail.com', 'gabriellemitchell@gmail.com', 'patricialang@gmail.com', 'amyking@gmail.com', 'danielhernandez@gmail.com', 'kyleowens@gmail.com', 'jeffreylong@gmail.com', 'susanware@gmail.com', 'jamesward@gmail.com', 'nicolestokes@gmail.com', 'matthewodom@gmail.com', 'sherriosborne@gmail.com', 'toddferguson@gmail.com', 'jefferybaker@gmail.com', 'michaelcampbell@gmail.com', 'jeffreyhull@gmail.com', 'jerryjimenez@gmail.com', 'dianebrown@gmail.com', 'karenmoore@gmail.com', 'roydouglas@gmail.com', 'jessicawinters@gmail.com', 'dananewton@gmail.com', 'franciscojackson@gmail.com', 'rhondahenderson@gmail.com', 'amberhernandez@gmail.com', 'marcialong@gmail.com', 'lisadixon@gmail.com', 'kevindavis@gmail.com', 'josephwerner@gmail.com', 'jeffreywright@gmail.com', 'joannfisher@gmail.com', 'annaramirez@gmail.com', 'jesseortega@gmail.com', 'mariajohnson@gmail.com', 'larrybradley@gmail.com', 'rachelmurphy@gmail.com', 'andreaevans@gmail.com', 'johnhill@gmail.com', 'jaredsmith@gmail.com', 'jamieleblanc@gmail.com', 'yolandajuarez@gmail.com', 'christyburke@gmail.com', 'amycooper@gmail.com', 'melissawilliams@gmail.com', 'johnmiller@gmail.com', 'johnkidd@gmail.com', 'jamesparker@gmail.com', 'christinarios@gmail.com', 'amywalton@gmail.com', 'nicolewelch@gmail.com', 'tracyschroeder@gmail.com', 'monicabrown@gmail.com', 'jasminjones@gmail.com', 'hannahgarrett@gmail.com', 'johnjones@gmail.com', 'leahtaylor@gmail.com', 'dwayneromero@gmail.com', 'michaelstout@gmail.com', 'jamesho@gmail.com', 'amandafoster@gmail.com', 'dannyberger@gmail.com', 'dawnnguyen@gmail.com', 'adamcraig@gmail.com', 'davidwong@gmail.com', 'bryanmcbride@gmail.com', 'caseymiller@gmail.com', 'zacharyboyd@gmail.com', 'richardbrown@gmail.com', 'matthewtaylor@gmail.com', 'russellrogers@gmail.com', 'stephenvazquez@gmail.com', 'karawells@gmail.com', 'alexanderbrown@gmail.com', 'rachelward@gmail.com', 'timothysmith@gmail.com', 'matthewwalters@gmail.com', 'juangonzales@gmail.com', 'lisaavila@gmail.com', 'theresavaldez@gmail.com', 'scottclark@gmail.com', 'kimberlyfuentes@gmail.com', 'christinebond@gmail.com', 'heathersalinas@gmail.com', 'lancecampbell@gmail.com', 'alexanderhampton@gmail.com', 'erinmartin@gmail.com', 'toddjohnson@gmail.com', 'vanessaavila@gmail.com', 'nicolepeterson@gmail.com', 'katherinemcintosh@gmail.com', 'tracynichols@gmail.com', 'stephaniewilliams@gmail.com', 'pennykirby@gmail.com', 'rebeccamcdaniel@gmail.com', 'craigturner@gmail.com', 'karenfinley@gmail.com', 'malikknapp@gmail.com', 'crystalross@gmail.com', 'caitlynballard@gmail.com', 'joshuacollins@gmail.com', 'corynicholson@gmail.com', 'rebeccalee@gmail.com', 'davidthomas@gmail.com', 'robertwhitehead@gmail.com', 'michelledunn@gmail.com', 'robertgray@gmail.com', 'rachelstevenson@gmail.com', 'alyssarichards@gmail.com', 'amandayates@gmail.com', 'elizabethross@gmail.com', 'taraanderson@gmail.com', 'samueldavidson@gmail.com', 'marcuskelly@gmail.com', 'nicholascollins@gmail.com', 'laurieescobar@gmail.com', 'amberbowen@gmail.com'];
        $gender = ['Male', 'Female', 'Batter not to mention'];
        $qualification = ['Matric', 'Intermediate', 'Bachelors', 'Masters', 'Phd'];
        $country = Country::pluck('id')->toArray();


        for ($i = 0; $i < count($firstName); $i++) {

            $User = User::create([
                'image' => '20220822071045.jpg',
                'first_name' => $firstName[$i],
                'last_name' => $secondName[$i],
                'password' => '12345678',
                'email' => $gmail[$i],
                'country_id' => $country[array_rand($country)],
                // 'gender' => 'Female',
                'gender' => $gender[array_rand($gender)],

            ]);
            Freelancer::create([
                'user_id' => $User->id,
                'qualification' => $qualification[array_rand($qualification)],
            ]);
            $User->roles()->attach($FREELANCER_ROLE_ID);
            $User->expertises()->attach($expertise->random(1)->pluck('id'));
            $User->skills()->attach($skills->random(1)->pluck('id'));
        }
    }
}
