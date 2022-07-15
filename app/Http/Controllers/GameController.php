<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Services\DataManager;

const API_WAIT_TIME = 15;

class GameController extends Controller
{

    /**
     * Get a list of all events for a given league
     *
     * @param $league string
     * @return object
     */
    public function games(Request $request): object
    {
        return Game::with(['homeTeam', 'awayTeam'])
            ->where('league', $request->league)
            ->get();
    }


    /**
     * Get the data for the game, either from the API or from cache
     *
     * @param $request Request
     * @return array
     */
    public function getGameData(Request $request)
    {

        $game = Game::where('id', $request->id)->first();

        $now = Carbon::parse(now());
        $lastQueried = Carbon::parse($game->updated_at);
        $secondsSinceLastAPIquery = $now->diffInSeconds($lastQueried);

        if ($game->updated_at == null || $secondsSinceLastAPIquery > API_WAIT_TIME) {
            $response = file_get_contents($game->feed);
            DataManager::parseAndLoad(json_decode($response), $game);
        }
        
        $data = Game::with([
            'homeTeam', 
            'awayTeam',
            'score',
            'homeTeamStats',
            'awayTeamStats'
        ])->where('id', $request->id)->first();

        return $data;

    }

}
