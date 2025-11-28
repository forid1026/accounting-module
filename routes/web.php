<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\JournalEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('accounts', AccountController::class);
Route::resource('journal', JournalEntryController::class);

