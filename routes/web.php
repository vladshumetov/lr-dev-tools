<?php

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

Route::get('/', [\App\Http\Controllers\HomeComtroller::class, 'index']);

Route::group(
    [
        'prefix' => '/worlds'
    ],
    function () {
        Route::get('', [\App\Http\Controllers\WorldsController::class, 'index'])->name('worlds');
        Route::post('/create_world', [\App\Http\Controllers\WorldsController::class, 'create_world'])->name('create_world');
        Route::post('/world-edit', [\App\Http\Controllers\WorldsController::class, 'world_edit'])->name('world_edit');
        Route::post('/world_edit', [\App\Http\Controllers\WorldsController::class, 'world_edit_finish'])->name('world_edit-finish');
    }
);
