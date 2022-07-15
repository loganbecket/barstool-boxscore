<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'first_name' => 'Oklahoma City',
                'last_name' => 'Thunder',
                'abbreviation' => 'OKC',
                'team_id' => 1,
                'city' => 'Oklahoma City',
                'state' => 'Oklahoma',
                'stadium' => 'Chesapeake Energy Arena',
                'league' => 'NBA',
                'conference' => 'West',
                'division' => 'Northwest',
            ],
            [
                'first_name' => 'Miami',
                'last_name' => 'Heat',
                'abbreviation' => 'MIA',
                'team_id' => 2,
                'city' => 'Miami',
                'state' => 'Florida',
                'stadium' => 'AmericanAirlines Arena',
                'league' => 'NBA',
                'conference' => 'East',
                'division' => 'Southeast',
            ],
            [
                'first_name' => 'Memphis',
                'last_name' => 'Grizzlies',
                'abbreviation' => 'MEM',
                'team_id' => 3,
                'city' => 'Memphis',
                'state' => 'Tennessee',
                'stadium' => 'FedExForum',
                'league' => 'NBA',
                'conference' => 'West',
                'division' => 'Southwest',
            ],
            [
                'first_name' => 'New York',
                'last_name' => 'Knicks',
                'abbreviation' => 'NYK',
                'team_id' => 4,
                'city' => 'New York',
                'state' => 'New York',
                'stadium' => 'Madison Square Garden',
                'league' => 'NBA',
                'conference' => 'East',
                'division' => 'Atlantic',
            ],
            [
                'first_name' => 'Seattle',
                'last_name' => 'Mariners',
                'abbreviation' => 'SEA',
                'team_id' => 5,
                'city' => 'Seattle',
                'state' => 'Washington',
                'stadium' => 'Safeco Field',
                'league' => 'MLB',
                'conference' => 'American',
                'division' => 'West',
            ],
            [
                'first_name' => 'Los Angeles',
                'last_name' => 'Angels',
                'abbreviation' => 'LAA',
                'team_id' => 6,
                'city' => 'Los Angeles',
                'state' => 'California',
                'stadium' => 'Angel Stadium of Anaheim',
                'league' => 'MLB',
                'conference' => 'American',
                'division' => 'West',
            ],
            [
                'first_name' => 'New York',
                'last_name' => 'Yankees',
                'abbreviation' => 'NYY',
                'team_id' => 7,
                'city' => 'Bronx',
                'state' => 'New York',
                'stadium' => 'Yankee Stadium',
                'league' => 'MLB',
                'conference' => 'American',
                'division' => 'East',
            ],
            [
                'first_name' => 'Boston',
                'last_name' => 'Red Sox',
                'abbreviation' => 'BOS',
                'team_id' => 8,
                'city' => 'Boston',
                'state' => 'Massachusetts',
                'stadium' => 'Fenway Park',
                'league' => 'MLB',
                'conference' => 'American',
                'division' => 'East',
            ],
            [
                'first_name' => 'Boston',
                'last_name' => 'Celtics',
                'abbreviation' => 'BOS',
                'team_id' => 9,
                'city' => 'Boston',
                'state' => 'Massachusetts',
                'stadium' => 'Boston Garden',
                'league' => 'NBA',
                'conference' => 'East',
                'division' => 'Atlantic',
            ],
            [
                'first_name' => 'Los Angeles',
                'last_name' => 'Lakers',
                'abbreviation' => 'LAK',
                'team_id' => 10,
                'city' => 'Los Angeles',
                'state' => 'California',
                'stadium' => 'Staples Center',
                'league' => 'NBA',
                'conference' => 'West',
                'division' => 'Pacific',
            ],
        ]);
    }
}
