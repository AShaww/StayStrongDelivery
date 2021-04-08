<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('customers')->group(function() {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('//createcustomer', [CustomerController::class, 'createcustomer'])->name('customers.createcustomer');
    Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('//{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('//edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('//{id}', [CustomerController::class, 'delete'])->name('customers.delete');
});

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

