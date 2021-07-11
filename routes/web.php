<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\CartPageController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view/product/{slug}', [App\Http\Controllers\ProductPage::class, 'ProductPage'])->name('product');
Route::get('/shopall/products/{slug}', [App\Http\Controllers\ProductGrid::class, 'ProductGrid'])->name('products');
Route::get('/view/collections/{slug}',[App\Http\Controllers\ViewCategoryController::class, 'index'])->name('category');

Route::namespace("Admin")->prefix('admin')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    //Route::get('/', 'HomeController@index')->name('admin.home');
    Route::namespace('Auth')->group(function(){
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
    //Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    
    Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/addproducts',[App\Http\Controllers\Admin\Product\AddProductController::class, 'addproduct'])->name('addproduct');
    Route::get('/update/products',[App\Http\Controllers\Admin\Product\UpdateProduct::class, 'index'])->name('admin.updateproduct');
    Route::get('/add/category',[App\Http\Controllers\Admin\Product\AddCategoryController::class, 'index'])->name('addcategory');
    
    });
   });

Route::get('/product/cart', [CartPageController::class, 'ShowCart'])->name('showcart');
Route::get('/pay/secure/stripe', [StripePaymentController::class, 'index'])->name('stripe');
Route::post('payment-process', [StripePaymentController::class, 'process']);
Route::get('/pay/secure/finalcheckout', [StripePaymentController::class, 'process'])->name('finalcheckout');