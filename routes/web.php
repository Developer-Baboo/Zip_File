<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\zipController;

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

Route::get('/', [zipController::class, 'index']);
Route::post('/upload_zip', [zipController::class, 'store'])->name('upload_zip');
