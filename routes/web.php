<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// CREATE -> post
// READ -> get
// UPDATE -> put(update all traits of a record) OR patch(update some traits of a record)
// DELETE -> destroy

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/edit2', [UserController::class, 'edit_return'])->name('users.edit2');
Route::get('/users/details', [UserController::class, 'details'])->name('users.details');
Route::get('/users/archive', [UserController::class, 'archive'])->name('users.archive');

Route::patch('/users/{user}/update', [UserController::class, 'update_remain'])->name('users.update');
Route::patch('/users/{user}/update2', [UserController::class, 'update_return'])->name('users.update2');

Route::post('/users/store', [UserController::class, 'store_remain'])->name('users.store');
Route::post('/users/store2', [UserController::class, 'store_return'])->name('users.store2');
Route::get('/users/deletion', [UserController::class, 'deletion'])->name('users.deletion');
Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore')->withTrashed();

Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete')->withTrashed();
