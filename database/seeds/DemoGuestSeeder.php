<?php

use Illuminate\Database\Seeder;
use App\Models\Party;
use App\Models\Guest;

class DemoGuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 25; ++$i)
        {
            $party = new Party([
                'email' => (rand(0,2) == 1)?$faker->email:null,
                'name' => $faker->name,
            ]);
            $party->save();

            $n = rand(1, 5);
            $guests = [];
            for($c = 0; $c < $n; ++$c)
            {
                $guests[] = new Guest([
                    'name' => $faker->firstName . ' ' . $faker->lastName,
                    'vegetarian' => $faker->boolean(20),
                    'dietary_restrictions' => (rand(0,10) < 3) ? $faker->realText(60, 2):null,
                ]);
            }
            $party->guests()->saveMany($guests);
        }

    }
}
