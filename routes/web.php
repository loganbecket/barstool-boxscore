<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxscoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contest/{league}', function () {
    return view('contest');
});

Route::get('/score/{league}', [BoxscoreController::class, 'score']);