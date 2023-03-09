<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['checkLevel:admin'])->name('user.index');
Route::get('user/create',  [App\Http\Controllers\UserController::class, 'create'])->middleware(['checkLevel:admin'])->name('user.create');
Route::get('user/store',   [App\Http\Controllers\UserController::class, 'store'])->middleware(['checkLevel:admin'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware(['checkLevel:admin'])->name('user.edit');
Route::get('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware(['checkLevel:admin'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware(['checkLevel:admin'])->name('user.show');
Route::get('user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->middleware(['checkLevel:admin'])->name('user.delete');


Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
