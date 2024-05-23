<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('index');
});

Route::post('/submit', [FormController::class, 'submit']);

Route::get('/link/{id}', [LinkController::class, 'show']);