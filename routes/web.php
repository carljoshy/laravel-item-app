<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });


Route::controller(UserController::class)->group(function(){
    Route::get('/register','register');
    Route::get('/login','login')->name('login');
    Route::post('/logout','logout');
    Route::post('/login/process','process');
    Route::post('/store', 'store');

});

Route::controller(ProductsController::class)->group(function(){
    Route::get('/','index')->middleware('auth');
    // Route::get('/add/product','create');
    Route::post('/add/product','storedata');
    Route::put('/product/{product}','update');

});


