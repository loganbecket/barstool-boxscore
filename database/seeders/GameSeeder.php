<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'league' => 'nba', 
                'venue' => 'AmericanAirlines Arena',
                'home_team_id' => 1,
                'home_logo' => 'heat.png',
                'away_team_id' => 2,
                'away_logo' => 'thunder.png',
                'start_date_time' => '2012-06-21T18:00:00-07:00',
                'city' => 'Miami',
                'state' => 'Florida',
                'status' => 'completed',
                'feed' => 'https://chumley.barstoolsports.com/dev/data/games/6c974274-4bfc-4af8-a9c4-8b926637ba74.json'
            ],
            [
                'league' => 'nba', 
                'venue' => 'FedExForum',
                'home_team_id' => 3,
                'home_logo' => 'grizzlies.png',
                'away_team_id' => 4,
                'away_logo' => 'knicks.png',
                'start_date_time' => '2022-03-11T18:00:00-07:30',
                'city' => 'Memphis',
                'state' => 'Tennessee',
                'status' => 'completed',
                'feed' => null
            ],
        ]);
    }
}
