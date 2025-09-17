<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

 
Route::get('/',[TaskController::class,'index'])->name('tasks.index');
Route::get('/task/create',[TaskController::class,'create'])->name('tasks.create');

//data insert or store 
Route::POST('/task/store',[TaskController::class,'store'])->name('tasks.store');

//delete
Route::POST('/task/{id}/delete',[TaskController::class,'destroy'])->name('tasks.delete');
