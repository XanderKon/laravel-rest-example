<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('news')->name('news')->controller(NewsController::class)->group(function () {
    Route::get('/', 'get')->name('.get');
    Route::post('/', 'create')->name('.create');
    Route::delete('/', 'delete')->name('.delete');
    Route::patch('/', 'update')->name('.update');

    Route::get('/search', 'search')->name('.search');
});
