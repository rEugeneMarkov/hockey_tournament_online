<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::controller(App\Http\Controllers\MainController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
});

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::prefix('main')
        ->name('main.')
        ->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\Main\MainController::class, 'index'])->name('index');
            Route::resource('tournament', App\Http\Controllers\Admin\Main\TournamentController::class);
        });
        Route::prefix('tournament{tournament}')
        ->name('tournament.')
        ->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\Tournament\MainController::class, 'index'])->name('index');
            Route::resource('arena', App\Http\Controllers\Admin\Tournament\ArenaController::class);
            Route::resource('group', App\Http\Controllers\Admin\Tournament\GroupController::class);
            Route::resource('team', App\Http\Controllers\Admin\Tournament\TeamController::class);
        });
        //Route::resource('tournament.group', App\Http\Controllers\Admin\Tournament\GroupController::class);
    });

Auth::routes();
