<?php

use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'user'], function () {
       Route::get('/', [UserController::class, 'index'])->name('user.index');
       Route::get('/create', [UserController::class, 'create'])->name('user.create');
       Route::post('/', [UserController::class, 'store'])->name('user.store');
       Route::get('/{userId}', [UserController::class, 'edit'])->name('user.edit');
       Route::patch('/{userId}', [UserController::class, 'update'])->name('user.update');
    });
});