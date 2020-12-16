<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/user/{id}',[HomeController::class,'user'])->name('user');
Route::post('/addImage',[HomeController::class,'store'])->name('addImage')->middleware('auth');
Route::get('/edit/{id}',[HomeController::class,'edit']);
Route::put('/update/{id}',[HomeController::class,'update']);
Route::get('/destroy/{id}', [HomeController::class,'destroy'])->name('destroy');

Route::post('like', [LikesController::class,'like']);
Route::delete('like', [LikesController::class,'dislike']);




