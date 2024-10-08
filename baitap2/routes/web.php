<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/one', [HiController::class,'pubai1']);
Route::get('/two', [HiController::class,'pubai2']);
Route::get('/three', [HiController::class,'pubai3']);
Route::get('/four', [HiController::class,'pubai4']);
