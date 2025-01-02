<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (requires authentication and verified email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (require authentication and verified email)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/ps2', function () {
    return view('pages.ps2startup');
});

Route::get('/platform/{platform_name}', [PlatformController::class, 'showByName'])->name('pages.platform');
Route::get('/generation/{slug}', [GenerationController::class, 'show'])->name('pages.generation');
Route::get('/items', [ItemController::class, 'index'])->name('pages.items');
Route::get('/item/{id}', [ItemController::class, 'show'])->name('pages.item');

// Include authentication routes (e.g., login, register)
require __DIR__.'/auth.php';
