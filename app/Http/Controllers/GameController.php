<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

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
     * Comment
     *
     * @param 
     * @return ???
     */
    public function getGameData(Request $request)
    {
        return 'time to make the donuts';
        // $game = Game::where('id', $request->id)
        //     ->first();

        // $response = file_get_contents($url);
        // $data = json_decode($response);

        // logger($response);

        // return response()->json($data);

        // check last query

        // if within 15 seconds, return cached values

        // if > 15s, make new API request
    }

}
