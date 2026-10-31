<?php

use App\Http\Controllers\GarageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('garages', GarageController::class);