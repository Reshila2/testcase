<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\VariantController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\Admin\AnswerController::class, 'create'])->name('home');
Route::post('store-form',[App\Http\Controllers\Admin\AnswerController::class, 'store']);
Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin'); // /admin
Route::resource('/question', QuestionController::class);
Route::resource('/variant', VariantController::class);
Route::resource('/answer', AnswerController::class);

