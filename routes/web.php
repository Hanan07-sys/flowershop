<?php

use App\Http\Controllers\Toko;
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


Route::get('/', [Toko::class ,'index'])->name('index');
Route::get('/detail/{id}', [Toko::class ,'detail'])->name('detail');
Route::get('/form', [Toko::class ,'form'])->name('form');
Route::get('/edit/{toko}', [Toko::class ,'edit'])->name('edit');
Route::get('/filter/{filter}', [Toko::class ,'filter']);
Route::get('/example/{id}', [Toko::class ,'show']);

// post
Route::post('/save',[Toko::class ,'save'])->name('save');

// put
Route::patch('/update/{toko}',[Toko::class ,'update'])->name('update');

// delete
Route::delete('/update/{toko}',[Toko::class ,'delete'])->name('delete');
