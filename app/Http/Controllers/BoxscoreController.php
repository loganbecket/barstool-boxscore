<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoxscoreController extends Controller
{
    /**
     * Query the Barstool API for a given league
     *
     * @param $request Request
     * @return array
     */
    public function score($league)
    {
        $url = config('api.' . $league . '.url');

        $response = file_get_contents($url);
        $newsData = json_decode($response);

        return response()->json($newsData);

        // check last query

        // if within 15 seconds, return cached values

        // if > 15s, make new API request

    }

}
