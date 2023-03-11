<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\RateChartController;  
use Illuminate\Http\Request;
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

Route::get('/buyer/viewprofile/{id}', [BuyerController::class,'viewProfile'])->middleware('role:2')->name('buyer.viewprofile');

Auth::routes();

Route::get('/buyer', [BuyerController::class,'index'])->middleware('role:2')->name('buyer');

Route::get('/seller', [SellerController::class,'index'])->middleware('role:1')->name('seller');
Route::get('/sellerProfile', [SellerController::class, 'getProfile'])->name('sellerProfile');
Route::put('/sellerProfile/{id}', [SellerController::class, 'update'])->name('sellerprofile.update');

Route::get('/ratecharts', [RateChartController::class, 'index'])->name('ratecharts');
Route::get('ratecharts/create', [RateChartController::class, 'create'])->name('ratecharts.create');
Route::post('ratecharts', [RateChartController::class, 'store'])->name('ratecharts.store');
Route::get('/ratecharts/edit/{id}', [RateChartController::class, 'edit'])->name('ratecharts.edit');
Route::put('/ratecharts/{id}', [RateChartController::class, 'update'])->name('ratecharts.update');
Route::delete('/ratecharts/{id}', [RateChartController::class, 'destroy'])->name('ratecharts.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
