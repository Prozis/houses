<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ParserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/', function () {
  return view('home');
})->name('index');

Route::get('/parser', function () {
  return view('parser');
})->middleware('auth')->name('parser');

Route::post('/parser', [ParserController::class, 'store'])->name('parser-post');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/feedback/all/{id}', [ContactController::class, 'showOneMessage'])
->name('showOneMessage');

Route::get('/feedback/all', [ContactController::class, 'allData'])
->name('feedback');

Route::post('/feedback', [ContactController::class, 'submit'])->name('feedback-form');

//русурсная маршрутизация
Route::resource('/articles', ArticleController::class);
