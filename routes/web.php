<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\TestDriveController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hello-world', function () {
    return Inertia::render('portalnpveiculos/HelloWorld');
})->name('hello.world');

Route::get('/teste-drive', function () {
    return Inertia::render('portalnpveiculos/teste-drive');
})->name('hello.world');

Route::get('/estoque', [VeiculoController::class, 'index'])->name('estoque.index');

Route::get('/test-drives', [TestDriveController::class, 'index']);
Route::post('/test-drives', [TestDriveController::class, 'store']);
Route::post('/test-drives/{id}/entrada', [TestDriveController::class, 'entrada']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/portalnpveiculos.php';
