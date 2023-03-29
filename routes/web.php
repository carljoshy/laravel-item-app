<?php

use App\Models\Roles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

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

// Route::resources([
//     'categories' => ProductsController::class,
//     'products' => CategoriesController::class,
// ]);

Route::controller(UserController::class)->group(function(){
    Route::get('/manage', 'manage');
    Route::post('/add/user','fetchUser');
    Route::get('/register','register');
    Route::get('/login','login')->name('login');
    Route::post('/logout','logout');
    Route::post('/login/process','process');
    Route::post('/store','store');
    Route::put('/user/{user}','update');
    Route::delete('/user/{user}','destroy');


});

Route::controller(ProductsController::class)->group(function(){
    Route::get('/','index')->middleware('auth');

    // Route::get('/add/product','create');
    Route::post('/add/product','storedata');
    Route::put('/product/{product}','update');
    Route::delete('/product/{product}','destroy');


});

Route::controller(CategoriesController::class)->group(function(){
    Route::get('/category', 'category');
    Route::post('/add/category','storedata');
    Route::put('/category/{category}','updateCategory');
    Route::delete('/category/{category}','destroy');


});

Route::controller(AccessController::class)->group(function(){
    Route::post('/assign/role','storedata');
    Route::delete('/role/{role}','destroy');

});


