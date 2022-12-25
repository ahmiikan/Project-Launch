<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstName = ['Client', 'Brynn', 'Roxanna', 'Ananda', 'Harvey', 'Austin', 'Darion', 'Enrique', 'Iyanna', 'Zainab', 'Janiya', 'Tristen', 'Marquez', 'Bradley', 'Gabriela', 'Aubrey', 'Reese', 'Aaron', 'John', 'Alesha', 'Vaughn', 'Macey', 'Leslie', 'Alaina', 'Kalvin', 'Jennah', 'Griselda', 'Reece', 'Jacquez', 'Raegan', 'Paris', 'Bryana', 'Darryl', 'Dalia', 'Paulina', 'Enoch', 'Isidro', 'Tyler', 'Giovanni', 'Cydney', 'Jaliyah', 'Geovanni', 'Dameon', 'Octavio', 'Dominique', 'Sean', 'Kirsten', 'Rylie', 'Gunnar', 'Hattie', 'Ashli', 'Claudio', 'Brynne', 'Emilie', 'Kaytlin', 'Reanna', 'Galilea', 'Marco', 'Madisyn', 'Kobi', 'Logan', 'Erick', 'Stormy', 'Treasure', 'Macy', 'Skyla', 'Kirsten', 'Araceli', 'Semaj', 'Shira', 'Yasmin', 'Melia', 'Teresa', 'Anna', 'Kendell', 'Tyler', 'Jayda', 'Leigh', 'Ronan', 'Reyna', 'Leann', 'Halley', 'Nathaniel', 'Suzanne', 'Olivia', 'Micah', 'Reece', 'Maren', 'Khalil', 'Dymond', 'Raul', 'Maura', 'Cielo', 'Estrella', 'Trenten', 'Marcus', 'Phoebe', 'Shannon', 'Laci', 'Ginger', 'Aliah', 'Anton', 'China', 'Lucas', 'Gunnar', 'Pedro', 'Kristal', 'Kylan', 'Gabriel', 'Cristian', 'Leanna', 'Karleigh', 'Devonta', 'Samuel', 'Semaj', 'Antoinette', 'Clint', 'Sydni', 'Geovanni', 'Bryson', 'Tonya', 'Geovanni', 'Mary', 'Kaytlyn', 'Emily', 'Keyshawn', 'Yvette', 'Mitchell', 'Kegan', 'Brookelyn', 'Adolfo', 'Josue', 'Riley', 'Cassandra', 'Allan', 'Adonis', 'Jean', 'Rochelle', 'Kelton', 'Briza', 'Isha', 'Jaron', 'Rachel', 'Jaylen', 'Edward', 'Rhys', 'Dallas', 'Mallorie', 'Oliver', 'Calli', 'Joaquin'];
        $secondName = ['Tester', 'McCarty', 'Russell', 'Bernstein', 'Hamel', 'Booker', 'Fraser', 'Gantt', 'Talbot', 'Amaro', 'Rodrigues', 'Molina', 'Traylor', 'Houston', 'Burr', 'Rosas', 'Jeffery', 'Hogue', 'McLaughlin', 'West', 'Spear', 'Stearns', 'Ladd', 'Andrews', 'Acker', 'Kunz', 'Willoughby', 'Mendoza', 'Darling', 'Forte', 'Hobbs', 'Alexander', 'Markham', 'Dowell', 'Shockley', 'Pullen', 'Evans', 'Kaye', 'Severson', 'Song', 'Antonio', 'McCallum', 'Murphy', 'Devlin', 'Keen', 'Wasson', 'Newton', 'Marlow', 'Singleton', 'Dockery', 'Barber', 'Huntley', 'Gallo', 'Fry', 'Dell', 'Crowe', 'Solorzano', 'Beck', 'Benedict', 'Christianson', 'Hodge', 'Cook', 'Carranza', 'Mohammed', 'Kimbrough', 'Forrester', 'Payton', 'Burge', 'Cahill', 'Pope', 'Jasper', 'Breen', 'Keegan', 'Monk', 'Spring', 'Cardona', 'Washburn', 'Phillips', 'Seeley', 'Gabriel', 'Covington', 'Whitney', 'Bernard', 'Becker', 'Lynn', 'Villegas', 'Almeida', 'Baca', 'Buss', 'Israel', 'Vallejo', 'Carlos', 'DeJesus', 'Muller', 'Gilliam', 'Blum', 'Tully', 'Lytle', 'Almeida', 'Thomas', 'Whitlock', 'Haggard', 'Barrera', 'Drury', 'Rooney', 'Pelletier', 'McCord', 'Butler', 'Barnes', 'Hartmann', 'McClanahan', 'Cormier', 'Scherer', 'Roush', 'Cartwright', 'Aiello', 'Leavitt', 'Coy', 'Munguia', 'Fitch', 'Oh', 'Connell', 'Carpenter', 'Landers', 'Kee', 'McCutcheon', 'Gleason', 'Spaulding', 'Huddleston', 'Ponder', 'Bennett', 'Beckman', 'Jacob', 'Cronin', 'Kemp', 'Koontz', 'Nieto', 'Buss', 'Terry', 'Schneider', 'Buffington', 'Clifford', 'Foust', 'Collins', 'Alaniz', 'Dow', 'Rich', 'Weston', 'Aguirre', 'Bourque', 'Ware'];
        $gmail = ['client@gmail.com', 'brynnmccarty@gmail.com', 'roxannarussell@gmail.com', 'anandabernstein@gmail.com', 'harveyhamel@gmail.com', 'austinbooker@gmail.com', 'darionfraser@gmail.com', 'enriquegantt@gmail.com', 'iyannatalbot@gmail.com', 'zainabamaro@gmail.com', 'janiyarodrigues@gmail.com', 'tristenmolina@gmail.com', 'marqueztraylor@gmail.com', 'bradleyhouston@gmail.com', 'gabrielaburr@gmail.com', 'aubreyrosas@gmail.com', 'reesejeffery@gmail.com', 'aaronhogue@gmail.com', 'johnmclaughlin@gmail.com', 'aleshawest@gmail.com', 'vaughnspear@gmail.com', 'maceystearns@gmail.com', 'leslieladd@gmail.com', 'alainaandrews@gmail.com', 'kalvinacker@gmail.com', 'jennahkunz@gmail.com', 'griseldawilloughby@gmail.com', 'reecemendoza@gmail.com', 'jacquezdarling@gmail.com', 'raeganforte@gmail.com', 'parishobbs@gmail.com', 'bryanaalexander@gmail.com', 'darrylmarkham@gmail.com', 'daliadowell@gmail.com', 'paulinashockley@gmail.com', 'enochpullen@gmail.com', 'isidroevans@gmail.com', 'tylerkaye@gmail.com', 'giovanniseverson@gmail.com', 'cydneysong@gmail.com', 'jaliyahantonio@gmail.com', 'geovannimccallum@gmail.com', 'dameonmurphy@gmail.com', 'octaviodevlin@gmail.com', 'dominiquekeen@gmail.com', 'seanwasson@gmail.com', 'kirstennewton@gmail.com', 'ryliemarlow@gmail.com', 'gunnarsingleton@gmail.com', 'hattiedockery@gmail.com', 'ashlibarber@gmail.com', 'claudiohuntley@gmail.com', 'brynnegallo@gmail.com', 'emiliefry@gmail.com', 'kaytlindell@gmail.com', 'reannacrowe@gmail.com', 'galileasolorzano@gmail.com', 'marcobeck@gmail.com', 'madisynbenedict@gmail.com', 'kobichristianson@gmail.com', 'loganhodge@gmail.com', 'erickcook@gmail.com', 'stormycarranza@gmail.com', 'treasuremohammed@gmail.com', 'macykimbrough@gmail.com', 'skylaforrester@gmail.com', 'kirstenpayton@gmail.com', 'araceliburge@gmail.com', 'semajcahill@gmail.com', 'shirapope@gmail.com', 'yasminjasper@gmail.com', 'meliabreen@gmail.com', 'teresakeegan@gmail.com', 'annamonk@gmail.com', 'kendellspring@gmail.com', 'tylercardona@gmail.com', 'jaydawashburn@gmail.com', 'leighphillips@gmail.com', 'ronanseeley@gmail.com', 'reynagabriel@gmail.com', 'leanncovington@gmail.com', 'halleywhitney@gmail.com', 'nathanielbernard@gmail.com', 'suzannebecker@gmail.com', 'olivialynn@gmail.com', 'micahvillegas@gmail.com', 'reecealmeida@gmail.com', 'marenbaca@gmail.com', 'khalilbuss@gmail.com', 'dymondisrael@gmail.com', 'raulvallejo@gmail.com', 'mauracarlos@gmail.com', 'cielodejesus@gmail.com', 'estrellamuller@gmail.com', 'trentengilliam@gmail.com', 'marcusblum@gmail.com', 'phoebetully@gmail.com', 'shannonlytle@gmail.com', 'lacialmeida@gmail.com', 'gingerthomas@gmail.com', 'aliahwhitlock@gmail.com', 'antonhaggard@gmail.com', 'chinabarrera@gmail.com', 'lucasdrury@gmail.com', 'gunnarrooney@gmail.com', 'pedropelletier@gmail.com', 'kristalmccord@gmail.com', 'kylanbutler@gmail.com', 'gabrielbarnes@gmail.com', 'cristianhartmann@gmail.com', 'leannamcclanahan@gmail.com', 'karleighcormier@gmail.com', 'devontascherer@gmail.com', 'samuelroush@gmail.com', 'semajcartwright@gmail.com', 'antoinetteaiello@gmail.com', 'clintleavitt@gmail.com', 'sydnicoy@gmail.com', 'geovannimunguia@gmail.com', 'brysonfitch@gmail.com', 'tonyaoh@gmail.com', 'geovanniconnell@gmail.com', 'marycarpenter@gmail.com', 'kaytlynlanders@gmail.com', 'emilykee@gmail.com', 'keyshawnmccutcheon@gmail.com', 'yvettegleason@gmail.com', 'mitchellspaulding@gmail.com', 'keganhuddleston@gmail.com', 'brookelynponder@gmail.com', 'adolfobennett@gmail.com', 'josuebeckman@gmail.com', 'rileyjacob@gmail.com', 'cassandracronin@gmail.com', 'allankemp@gmail.com', 'adoniskoontz@gmail.com', 'jeannieto@gmail.com', 'rochellebuss@gmail.com', 'keltonterry@gmail.com', 'brizaschneider@gmail.com', 'ishabuffington@gmail.com', 'jaronclifford@gmail.com', 'rachelfoust@gmail.com', 'jaylencollins@gmail.com', 'edwardalaniz@gmail.com', 'rhysdow@gmail.com', 'dallasrich@gmail.com', 'mallorieweston@gmail.com', 'oliveraguirre@gmail.com', 'callibourque@gmail.com', 'joaquinware@gmail.com'];
        $gender = ['Male', 'Female', 'Batter not to mention'];
        $country = Country::pluck('id')->toArray();


        for ($i = 0; $i < count($firstName); $i++) {

            $client = User::create([
                'image' => '20220822071045.jpg',
                'first_name' => $firstName[$i],
                'last_name' => $secondName[$i],
                'password' => '12345678',
                'email' => $gmail[$i],
                'country_id' => $country[array_rand($country)],
                'gender' => $gender[array_rand($gender)],

            ]);

            $client->roles()->attach(3);
        }
    }
}
