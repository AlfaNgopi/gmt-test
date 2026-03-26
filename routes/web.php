<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index'] );
Route::post('/create', [HomePageController::class, 'create'] )->name('create');
Route::post('/update', [HomePageController::class, 'update'] )->name('update');
Route::post('/delete', [HomePageController::class, 'delete'] )->name('delete');
