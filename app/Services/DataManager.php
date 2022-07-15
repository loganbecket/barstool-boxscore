<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Team;
use App\Models\Score;
use App\Models\TeamStat;
use App\Models\PlayerStat;

class DataManager
{
    
    /**
     * Parse the API result and persist the the appropriate tables
     *
     * @param $data object
     * @param $game object
     * @return void
     */
    public static function parseAndLoad($data, $game): void
    {
        Game::where('id', $game->id)
            ->update(['status'=> $data->event_information->status]);

        // TODO: Figure out how to make the team IDs available without subsequent database calls
        $homeTeamId = Team::where('abbreviation', $data->home_team->abbreviation)
            ->where('league', $data->league)
            ->pluck('id')
            ->first();

        $awayTeamId = Team::where('abbreviation', $data->away_team->abbreviation)
            ->where('league', $data->league)
            ->pluck('id')
            ->first();

        $teamIds = [
            'homeTeamId' => $homeTeamId,
            'awayTeamId' => $awayTeamId
        ];
            
        $periods = count($data->home_period_scores);
        for ($i = 0; $i < $periods; $i++) {
            Score::firstOrCreate([
                'game_id' => $game->id, 
                'period' => $i + 1
            ],
            [
                'home_score' => $data->home_period_scores[$i],
                'away_score' => $data->away_period_scores[$i]
            ]);
        }

        self::loadTeamTotals($data, $game->id, $teamIds);
        self::loadPlayerStats($data, $game->id, $teamIds);

    }


    /**
     * Update or load the passed object as a normalized team stat
     *
     * @param $data object
     * @param $gameId integer
     * @param $teamIds array
     * @return void
     */
    protected static function loadTeamTotals($data, $gameId, $teamIds): void
    {
        $validKeys = [
            'home_totals', 
            'away_totals', 
            'home_batter_totals', 
            'away_batter_totals', 
            'home_errors', 
            'away_errors'
        ];

        collect($data)->each(function ($items, $key) use ($validKeys, $gameId, $teamIds) {
            if (in_array($key, $validKeys)) {

                $homeTeamId = $teamIds['homeTeamId'];
                $awayTeamId = $teamIds['awayTeamId'];
                $homeOrAway = substr($key, 0, 4);
                $teamId = $homeOrAway == 'home' ? $homeTeamId : $awayTeamId;

                if (in_array(gettype($items), ['object', 'array'])) {
                    foreach ($items as $stat => $item) {
                        self::persistTeam($gameId, $teamId, $homeOrAway, $stat, $item);
                    }
                } else {
                    self::persistTeam($gameId, $teamId, $homeOrAway, $key, $items);
                }
            }
        });
    }


    /**
     * Update or load the passed object as a normalized player stat
     *
     * @param $data object
     * @param $gameId integer
     * @param $teamIds array
     * @return void
     */
    protected static function loadPlayerStats($data, $gameId, $teamIds): void
    {
        $validKeys = [
            'home_stats', 
            'away_stats', 
            'home_batters', 
            'away_batters', 
        ];

        collect($data)->each(function ($items, $key) use ($validKeys, $gameId, $teamIds) {
            if (in_array($key, $validKeys)) {

                $homeTeamId = $teamIds['homeTeamId'];
                $awayTeamId = $teamIds['awayTeamId'];
                $homeOrAway = substr($key, 0, 4);
                $teamId = $homeOrAway == 'home' ? $homeTeamId : $awayTeamId;

                foreach ($items as $item) {
                    $data = collect($item)->toJson();
                    self::persistPlayer($gameId, $teamId, $homeOrAway, $data, $item->display_name);
                }
            }
        });
    }


    /**
     * Helper function to create or update a record
     *
     * @param $gameId int
     * @param $teamId int
     * @param $homeOrAway string
     * @param $stat string
     * @param $value int|string
     * @return void
     */
    protected static function persistTeam($gameId, $teamId, $homeOrAway, $stat, $value): void
    {
        $fields = [
            'game_id' => $gameId,
            'team_id' => $teamId,
            'home_away' => $homeOrAway,
            'stat' => $stat
        ];
        TeamStat::firstOrCreate($fields, ['value' => $value]);
    }


    /**
     * Helper function to create or update a record
     *
     * @param $gameId int
     * @param $teamId int
     * @param $homeOrAway string
     * @param $statObj Object
     * @param $player string
     * @return void
     */
    protected static function persistPlayer($gameId, $teamId, $homeOrAway, $statObj, $player): void
    {
        $fields = [
            'game_id' => $gameId,
            'team_id' => $teamId,
            'player' => $player,
            'home_away' => $homeOrAway,
        ];
        PlayerStat::firstOrCreate($fields, ['stat_object' => $statObj]);
    }

}
