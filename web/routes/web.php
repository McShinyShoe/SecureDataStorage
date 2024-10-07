<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/encrypt', function () {
    return view('encrypt');
});
Route::get('/decrypt', function () {
    return view('decrypt');
});
