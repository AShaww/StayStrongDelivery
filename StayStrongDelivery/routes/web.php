<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
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

Route::get('/packages', [PackageController::class, 'index']);
Route::get('/packages/create', [PackageController::class, 'create']);
Route::post('/packages', [PackageController::class, 'store']);
Route::get('/packages/{id}', [PackageController::class, 'show']);
Route::delete('/packages/{id}', [PackageController::class, 'destroy']);