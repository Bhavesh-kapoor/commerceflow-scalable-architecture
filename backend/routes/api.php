<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1')->group(function(){
    // user authentication routes
    Route::prefix("/auth")->group(function(){
        Route::post('/register' , [AuthController::class,'register']);
    });
});