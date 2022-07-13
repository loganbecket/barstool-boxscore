<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxscoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/boxscore', [BoxscoreController::class, 'boxscore']);