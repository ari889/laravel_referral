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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/packages/{id}', [App\Http\Controllers\PackageController::class, 'index'])->name('packages');
Route::post('/packages/create', [App\Http\Controllers\PackageController::class, 'create'])->name('packages.create');
//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'indexShow'])->name('dashboard.index');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('dashboard.profile');
Route::post('/password/change', [App\Http\Controllers\HomeController::class, 'passwordChange'])->name('password.change');
Route::post('/name/change', [App\Http\Controllers\HomeController::class, 'nameChange'])->name('name.change');
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('dashboard.help');
Route::get('/referral', [App\Http\Controllers\HomeController::class, 'referral'])->name('dashboard.referral');
Route::get('/pool', [App\Http\Controllers\HomeController::class, 'pool'])->name('dashboard.pool');
Route::post('/register/getallusers', [App\Http\Controllers\PackageController::class, 'allUsers'])->name('dashboard.users');
