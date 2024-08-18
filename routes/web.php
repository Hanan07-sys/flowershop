<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TokoController;
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


Route::get('/', [TokoController::class, 'index'])->name('index');
Route::get('/detail/{id}', [TokoController::class, 'detail'])->name('detail');
Route::get('/filter/{filter}', [TokoController::class, 'filter']);
Route::get('/example/{id}', [TokoController::class, 'show']);
Route::get('/change_password', [HomeController::class, 'change_password'])->name('change_password');
Route::patch('/save_password', [HomeController::class, 'save_password'])->name('save_password');



// middleware
Route::middleware(['admin'])->group(function () {

    // post
    Route::get('/form', [TokoController::class, 'form'])->name('form');
    Route::post('/save', [TokoController::class, 'save'])->name('save');

    // Edit
    Route::get('/edit/{toko}', [TokoController::class, 'edit'])->name('edit');
    Route::patch('/update/{toko}', [TokoController::class, 'update'])->name('update');

    // delete
    Route::delete('/update/{toko}', [TokoController::class, 'delete'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
