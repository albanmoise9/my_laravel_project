<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GigController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\UserController;
use App\Models\Gig;

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
Route::prefix('gigs')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('create', [GigController::class, 'create'])->name('gigcreate');
        Route::get('manage', [GigController::class, 'manage'])->name('gigmanage');
        Route::get('{id}/edit', [GigController::class, 'edit'])->name('gigedit');
        Route::delete('{gig}/delete', [GigController::class, 'delete'])->name('delete');
        Route::put('{gig}', [GigController::class, 'update'])->name('update');
    });
    Route::get('{gig}', [GigController::class, 'show'])->name('gigshow');

});

Route::get('/', [GigController::class, 'index'])->name('index');


Route::post('/gigs', [GigController::class, 'store'])->middleware('auth')->name('gigstore');


Route::middleware('guest')->group(function(){
    Route::post('/accounts/store', [UserController::class, 'store'])->name('store');
    Route::post('/accounts', [UserController::class, 'authen'])->name('authen');

    Route::prefix('accounts')->group(function(){
        Route::get('register', [UserController::class, 'create'])->name('register');
        Route::get('login', [UserController::class, 'login'])->name('login');
    });
});
Route::post('/accounts/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');









