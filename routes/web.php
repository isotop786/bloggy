<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\AuthController;


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
    return view('home');
})->name('home');

// auth routes
Route::get('/login',[AuthController::class,'login_form'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register_form'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');


// post routes 
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts',[PostController::class,'store'])->name('posts');
Route::get('/posts/create/',[PostController::class,'create'])->name('create');
Route::get('/posts/{post}/',[PostController::class,'single'])->name('single');
Route::get('/posts/{post}/update-from',[PostController::class,'edit'])->name('edit');
Route::put('/posts/{post}/update',[PostController::class,'update'])->name('update');
Route::delete('/posts/{post}/delete',[PostController::class,'delete'])->name('delete');
