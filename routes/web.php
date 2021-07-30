<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::get('/',[SubscriptionController::class,'home'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum'])->get('inscrever',[SubscriptionController::class,'index']);
Route::middleware(['auth:sanctum'])->post('inscrever',[SubscriptionController::class,'store']);
Route::middleware(['auth:sanctum'])->get('inscricao/{subs}',[SubscriptionController::class,'details'])->name('details');

