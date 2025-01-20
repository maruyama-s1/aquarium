<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\BaseInfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
    return view('show');
});

Route::get('/home', 'App\Http\Controllers\VisitedInfoController@get_user_aquarium_data');