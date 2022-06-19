<?php

use App\Http\Controllers\customerController;
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


Route::get('customer',[customerController::class,'index'])->name('customer');
Route::get('customer-create',[customerController::class,'create'])->name('customer.create');
Route::post('customer-create',[customerController::class,'store'])->name('customer.store');
Route::get('customer-edit/{id}',[customerController::class,'edit'])->name('customer.edit');
Route::get('customer-delete/{id}',[customerController::class,'delete'])->name('customer.delete');
Route::put('customer-update/{id}',[customerController::class,'update'])->name('customer.update');
Route::get('customer-search',[customerController::class,'searCustomer'])->name('customer.search');
Route::get('customer-filter',[customerController::class,'filter'])->name('customer.filter');


