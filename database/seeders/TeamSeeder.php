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
        ]);
    }
}
