<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [CustomerController::class, 'index'])->middleware('verified')->name('dashboard');
Route::get('/create-customer', [CustomerController::class, 'create'])->middleware('verified')->name('customer.create');
Route::post('/create-customer', [CustomerController::class, 'store'])->middleware('verified')->name('customer.store');
Route::get('/edit-customer/{customer}', [CustomerController::class, 'edit'])->middleware('verified')->name('customer.edit');
Route::put('/edit-customer', [CustomerController::class, 'update'])->middleware('verified')->name('customer.update');
Route::delete('/delete-customer/{customer}', [CustomerController::class, 'destroy'])->middleware('verified')->name('customer.delete');
