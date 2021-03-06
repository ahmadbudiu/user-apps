<?php

use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
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
    return redirect(RouteServiceProvider::HOME);
//    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'user'], function () {
       Route::get('/', [UserController::class, 'index'])->name('user.index')->middleware('can:read,App\Models\User');
       Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('can:create,App\Models\User');
       Route::post('/', [UserController::class, 'store'])->name('user.store')->middleware('can:create,App\Models\User');
       Route::get('/{userId}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('can:update,App\Models\User');
       Route::patch('/{userId}', [UserController::class, 'update'])->name('user.update')->middleware('can:update,App\Models\User');
    });
});