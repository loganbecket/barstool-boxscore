<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoxscoreController extends Controller
{
    /**
     * Query the boxscore API for the passed league
     *
     * @param $request Request
     * @return array
     */
    public function boxscore(Request $request)
    {
        // check last query

        // if within 15 seconds, return cached values

        // if > 15s, make new API request

        
        return $request->league;
    }

}
