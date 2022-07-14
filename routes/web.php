<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{league}', function () {
    $league = request('league');
    return view('games', compact('league'));
});

Route::get('/boxscore/{id}', function () {
    $id = request('id');
    return view('boxscore', compact('id'));
});

Route::post('/games', [GameController::class, 'games']);
Route::post('/game/{id}', [GameController::class, 'getGameData']);
