<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [MountainController::class, 'index'])
    ->name('mountains.index');

Route::get('/mountain/{mountain}', [MountainController::class, 'show'])
    ->name('mountains.show')
    ->where('mountain', '[0-9]+');
