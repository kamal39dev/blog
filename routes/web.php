<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manage;


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
Route::get('/add',[manage::class, 'AddArticle'])->name('add');
Route::post('/add',[manage::class, 'AddArticle'])->name('add');
Route::get('/view',[manage::class, 'view'])->name('/view');
Route::get('/read/{id}',[manage::class, 'read']);
Route::post('/read/{id}',[manage::class, 'read']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
