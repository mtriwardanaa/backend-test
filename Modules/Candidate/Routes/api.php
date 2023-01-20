<?php

use Illuminate\Support\Facades\Route;
use Modules\Candidate\Http\Controllers\v1\CandidateApi;

Route::get('/', function () {
    return redirect()->route('Api');
});

Route::prefix('v1')->group(function () {
    Route::middleware('auth:api')->group(
        function () {
            Route::controller(CandidateApi::class)->prefix('candidate')->group(
                function () {
                        Route::get('/', 'list')->middleware('PolicyCheck:candidate.read');
                        Route::post('/create', 'create')->middleware('PolicyCheck:candidate.create');
                        Route::post('/update/{candidate_id}', 'update')->middleware('PolicyCheck:candidate.update');
                        Route::delete('/delete/{candidate_id}', 'delete')->middleware('PolicyCheck:candidate.delete');
                    }
            );
        }
    );
});
