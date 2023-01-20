<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokenApi;

Route::get('/', function () {
    return redirect()->route('Api');
});

Route::prefix('v1')->group(function () {

    Route::controller(TokenApi::class)->prefix('oauth')->group(
        function () {
            Route::post('/token', 'generateToken');
        }
    );
});
