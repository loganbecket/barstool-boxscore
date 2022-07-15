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
                'home_team_id' => 2,
                'home_logo' => 'heat.png',
                'away_team_id' => 1,
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
            [
                'league' => 'mlb', 
                'venue' => 'Angel Stadium of Anaheim',
                'home_team_id' => 6,
                'home_logo' => 'angels.png',
                'away_team_id' => 5,
                'away_logo' => 'mariners.png',
                'start_date_time' => '2012-09-26T19:05:00-07:00',
                'city' => 'Anaheim',
                'state' => 'California',
                'status' => 'completed',
                'feed' => 'https://chumley.barstoolsports.com/dev/data/games/eed38457-db28-4658-ae4f-4d4d38e9e212.json'
            ],
            [
                'league' => 'mlb', 
                'venue' => 'Yankee Stadium',
                'home_team_id' => 7,
                'home_logo' => 'yankees.png',
                'away_team_id' => 8,
                'away_logo' => 'redsox.png',
                'start_date_time' => '2006-7-15T19:05:00-07:00',
                'city' => 'Bronx',
                'state' => 'New York',
                'status' => 'completed',
                'feed' => null
            ],
            [
                'league' => 'nba', 
                'venue' => 'Boston Garden',
                'home_team_id' => 9,
                'home_logo' => 'celtics.png',
                'away_team_id' => 10,
                'away_logo' => 'lakers.png',
                'start_date_time' => '2005-4-18T19:05:00-07:00',
                'city' => 'Boston',
                'state' => 'Massachusetts',
                'status' => 'completed',
                'feed' => null
            ],
        ]);
    }
}
