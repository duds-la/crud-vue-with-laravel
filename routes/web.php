<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Models\Customer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('customers', [CustomerController::class,'index'])->name('customers.index');

Route::get('customers/create', [CustomerController::class,'create']);
Route::post('customers', [CustomerController::class,'store']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('profile.destroy');
Route::get('customers/{customer}/edit', [CustomerController::class,'edit']);
Route::put('customers/{customer}', [CustomerController::class,'update']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
