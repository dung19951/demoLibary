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
Route::prefix('admin')->group(function (){
    Route::get('home',[\App\Http\Controllers\BooksController::class,'index'])->name('admin.home');
    Route::get('create',[\App\Http\Controllers\BooksController::class,'create'])->name('admin.create');
    Route::post('store',[\App\Http\Controllers\BooksController::class,'store'])->name('admin.store');
    Route::get('edit/{id}',[\App\Http\Controllers\BooksController::class,'edit'])->name('admin.edit');
    Route::post('edit/{id}',[\App\Http\Controllers\BooksController::class,'update'])->name('admin.update');
    Route::get('delete/{id}',[\App\Http\Controllers\BooksController::class,'delete'])->name('admin.delete');
});
