<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Score;

class DataManager
{
    
    /**
     * Parse the API result and persist the the appropriate tables
     *
     * @param $data object
     * @param $game object
     * @return void
     */
    public static function parseAndLoad($data, $game)
    {

        Game::where('id', $game->id)
            ->update(['status'=> $data->event_information->status]);

        $periods = count($data->home_period_scores);
        for ($i = 0; $i < $periods; $i++) {
            Score::firstOrCreate([
                'game_id' => $game->id, 
                'period' => $i + 1
            ],
            [
                'home_score' => $data->home_period_scores[$i],
                'away_score' => $data->away_period_scores[$i],
            ]);
        }


    }
}
