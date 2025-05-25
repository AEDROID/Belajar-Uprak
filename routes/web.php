<?php

use App\Http\Controllers\FruitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('indexbuah');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/index',[FruitController::class, 'index'])->name('indexbuah');
    Route::resource('fruits', FruitController::class);
});


Route::get('/print', [FruitController::class, 'print'])->name('fruits.print');


require __DIR__.'/auth.php';
