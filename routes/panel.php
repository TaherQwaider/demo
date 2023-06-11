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


Route::prefix('panel')->middleware('guest:user')->group(function (){
    Route::get('login', [\App\Http\Controllers\panel\auth\AuthController::class, 'loginView']);

    Route::post('login', [\App\Http\Controllers\panel\auth\AuthController::class, 'login'])->name('login');
});


Route::prefix('panel')->middleware('auth:user')->group(function (){

    Route::get('profile/{id}', [\App\Http\Controllers\panel\auth\AuthController::class, 'profile'])->name('profile');
    Route::get('logout', [\App\Http\Controllers\panel\auth\AuthController::class, 'logout'])->name('logout');

    Route::get('usersList', [\App\Http\Controllers\UserController::class, 'userList'])->name('users.list');
    Route::get('usersList/getData', [\App\Http\Controllers\UserController::class, 'getData'])->name('users.list.getData');

    Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/{id}/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');

    Route::resource('stores', \App\Http\Controllers\panel\StoreController::class);
    Route::post('store/{id}/restore', [\App\Http\Controllers\panel\StoreController::class, 'restore'])->name('stores.restore');

    Route::resource('products', \App\Http\Controllers\panel\ProductController::class);
    Route::post('product/{id}/restore', [\App\Http\Controllers\panel\ProductController::class, 'restore'])->name('products.restore');

    Route::get('payment_report', [\App\Http\Controllers\panel\TransactionReportController::class, 'payment_report'])->name('payment_report');
    Route::get('product_report', [\App\Http\Controllers\panel\TransactionReportController::class, 'product_report'])->name('product_report');

});

