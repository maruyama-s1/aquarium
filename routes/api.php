<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ※以下のルーティングを確認するためには"Talend API Tester"の利用が必要
Route::get('/users_aquarium_data', 'App\Http\Controllers\VisitedInfoController@get_users_aquarium_data');

Route::post('/requests/add_visited_info', 'App\Http\Controllers\VisitedInfoController@add_visited_info')->name('requests.add_visited_info');