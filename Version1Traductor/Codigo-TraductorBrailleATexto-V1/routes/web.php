<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TranslationController;


Route::get('/', function () {
    return Inertia::render('Homepage', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/diccionario', function () {
    return Inertia::render('Dictionary');
});

Route::post('/translate-to-braille', [TranslationController::class, 'translateToBraille']);
