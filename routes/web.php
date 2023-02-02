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

Route::get('/', [\App\Http\Controllers\Guest\HomeController::class,'index'])->name('home');
Route::get('/about-us', [\App\Http\Controllers\Guest\HomeController::class,'aboutus'])->name('aboutus');
Route::get('/polling/{id}', [\App\Http\Controllers\Guest\HomeController::class,'polling'])->name('polling');
Route::get('/polling/{id}/vote/{value}', [\App\Http\Controllers\Guest\HomeController::class,'vote'])->name('vote');
Route::get('/polling/{id}/summary', [\App\Http\Controllers\Guest\HomeController::class,'summary'])->name('summary');


Route::controller(\App\Http\Controllers\Admin\QuestionController::class)
    ->prefix('question')
    ->name('question.')
    ->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/add', 'add')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('{id}/detail', 'detail')->name('detail');
        Route::post('{id}/update', 'update')->name('update');
        Route::get('{id}/destroy', 'destroy')->name('destroy');
        Route::get('/print', 'print')->name('print');
    });
