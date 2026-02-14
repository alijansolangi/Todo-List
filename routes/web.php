<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/',[TaskController::class, 'index'])->name('index');
Route::get('/create',[TaskController::class, 'create'])->name('create');
Route::get('/edit/{id}',[TaskController::class, 'edit'])->name('edit');
Route::post('/store',[TaskController::class, 'store'])->name('store');
Route::post('/show/{id}',[TaskController::class, 'show'])->name('show');
Route::put('/update/{id}',[TaskController::class, 'update'])->name('update');
Route::delete('/delete/{id}',[TaskController::class, 'destroy'])->name('delete');
Route::get('/fav/{id}',[TaskController::class, 'fav'])->name('fav');
Route::get('/status/{id}',[TaskController::class, 'status'])->name('status');
