<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/',[TaskController::class,'index'])->name('tasks.index');
Route::get('/task/create',[TaskController::class,'create'])->name('tasks.create');

//data insert or store
Route::POST('/task/store',[TaskController::class,'store'])->name('tasks.store');

//data edit
Route::get('/task/{id}/edit',[TaskController::class,'edit'])->name('tasks.edit');

//update
Route::put('/task/{id}/update', [TaskController::class,'update'])->name('tasks.update');


//delete
Route::delete('/task/{id}/delete',[TaskController::class,'destroy'])->name('tasks.delete');
