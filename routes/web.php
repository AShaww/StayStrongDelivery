<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CustomerController;
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

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/createcustomer', [CustomerController::class, 'createcustomer'])->name('customers.createcustomer');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');

Route::post('/customers', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'delete'])->name('customers.delete');



Route::prefix('packages')->group(function() {
    Route::get('', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/edit/{id}', [PackageController::class, 'editView'])->name('packages.editview');
    Route::post('/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::get('/trashed', [PackageController::class, 'indexWithTrashed'])->name('packages.index');
    Route::get('/createorder', [PackageController::class, 'createorder'])->name('packages.createorder');
    Route::post('', [PackageController::class, 'store'])->name('packages.store');
    Route::get('/{id}', [PackageController::class, 'show'])->name('packages.show');
    Route::post('/{id}', [PackageController::class, 'addStatus'])->name('packages.updatestatus');
    Route::delete('/{id}', [PackageController::class, 'delete'])->name('packages.delete');
});


Auth::routes([
    // 'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

