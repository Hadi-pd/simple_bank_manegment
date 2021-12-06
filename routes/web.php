<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'isAdmin'])->group( function () {
    Route::get('admin',[AdminController::class,'index']);
    Route::get('accounts',[AccountsController::class,'index']);
    Route::get('loans',[LoansController::class,'index']);
});

Route::get('/test', [TestController::class, 'test']);