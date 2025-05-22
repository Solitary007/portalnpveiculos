<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hello-world', function () {
    return Inertia::render('portalnpveiculos/HelloWorld');
})->name('hello.world');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/portalnpveiculos.php';
