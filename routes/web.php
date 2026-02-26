<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/birthday-cake', function () {
    return view('birthday-cake');
});

Route::get('/demos', function () {
    return view('demos');
});

Route::get('/cake/step/{step}', function (int $step) {
    abort_unless($step >= 0 && $step <= 5, 404);

    return view("cake.step-{$step}");
});
