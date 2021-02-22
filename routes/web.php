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

Route::get('/packages', [PackageController::class, 'index'])->name('packages.index')->middleware('auth');
Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show')->middleware('auth');
Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('packages.destroy')->middleware('auth');


Auth::routes([
    // 'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

