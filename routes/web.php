<?php

use App\Models\Animal;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('display', 'App\Http\Controllers\HomeController@display')->name('display account')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('requests', [App\Http\Controllers\AdoptionsController::class, 'requests'])->name('requests')->middleware('auth');;
Route::get('approve', [App\Http\Controllers\AdoptionsController::class, 'approve'])->name('approve');
Route::get('deny', [App\Http\Controllers\AdoptionsController::class, 'deny'])->name('deny');
Route::get('requests_history', [App\Http\Controllers\AdoptionsController::class, 'requests_history'])->name('requests_history')->middleware('auth');
Route::get('all_adoptions', [App\Http\Controllers\AdoptionsController::class, 'all_adoptions'])->name('all_adoptions')->middleware('auth');;
Route::get('adopter', [App\Http\Controllers\AdoptionsController::class, 'adopter'])->name('adopter')->middleware('auth');;
Route::get('onFilter', [App\Http\Controllers\AnimalController::class, 'onFilter'])->name('onFilter')->middleware('auth');;


use App\Http\Controllers\AnimalController;
Route::resource('list', AnimalController::class)->middleware('auth');

use App\Http\Controllers\AdoptionsController;
Route::resource('Adoptions', AdoptionsController::class)->middleware('auth');
