<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PadletController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('login', [AuthController::class, 'doLogin'] )->name('login');
Route::get('register',[AuthController::class,'registerView'])->name('register');
Route::post('register',[AuthController::class,'doRegister'])->name('do-register');
Route::get('userpage',[UserController::class,'userpageView']);
Route::get('create-padlet',[UserController::class, 'createView'])->name('create-padlet');
//Route::post('padlet/{id}',[UserController::class, ''])->name('create-padlet');
Route::get('padlet/{id}', [PadletController::class, 'padletView'])->name('padlet');
Route::post('create-padlet', [PadletController::class, 'padletCreate'])->name('create-padlet');
//Route::get('padlet/{id}', [PadletController::class, 'padletView'])->name('post');

Route::post('padlet/{id}', [PostController::class, 'postCreate'])->name('post');
