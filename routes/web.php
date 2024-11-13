<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
 
Route::get('/', [HomeController::class,'index'])->name('home');


Route::post('/create',[PostController::class,'createController'])->name('create');
Route::get('/edit/{id}', [PostController::class, 'editController'])->name('edit');
Route::post('/update/{id}', [PostController::class, 'updateController'])->name('update');
Route::get('/delete/{id}', [PostController::class, 'deleteController'])->name('delete');
