<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    Route::redirect('/', '/admin');
});

Route::fallback(function () {
    abort(404);
});
