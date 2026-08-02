<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function(){
    return "hi brother";
});

//  test  internam laravel service
Route::get("/test-mail",function(){
    $response = Http::post('http://notification-service:3000/send-email',[
        "email"=>"bhavesh@gmail.com",
        "name"=>"bhavesh kapoor"
    ]);

    return $response->json();
});
