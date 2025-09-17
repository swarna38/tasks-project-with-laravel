<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

 
Route::get('/',[TaskController::class,'index'])->name('tasks.index');
Route::get('/task/create',[TaskController::class,'create'])->name('tasks.create');
Route::POST('/task/store',[TaskController::class,'store'])->name('tasks.store');
