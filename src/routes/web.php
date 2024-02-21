<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrefectureController;
use App\Http\Controllers\MountainController;

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

Route::get('/', [PrefectureController::class, 'index'])
    ->name('prefectures.index');

Route::get('/prefecture/{code}', [PrefectureController::class, 'show'])
    ->name('prefectures.show')
    ->where('prefecture', '[0-9]+');

Route::get('/mountain/{mountain}', [MountainController::class, 'weather'])
    ->name('mountains.weather')
    ->where('mountain', '[0-9]+');
