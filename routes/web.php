<?php

use App\Http\Controllers\FunctionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FunctionController::class, 'index'])->name('index');
Route::get('/add', [FunctionController::class, 'add'])->name('add');
Route::post('/add-post', [FunctionController::class, 'addPost'])->name('addPost');
Route::get('/edit/{id}', [FunctionController::class, 'edit'])->name('edit');
Route::post('/edit-post/{id}', [FunctionController::class, 'editPost'])->name('editPost');
Route::get('/delete/{id}', [FunctionController::class, 'delete'])->name('delete');

