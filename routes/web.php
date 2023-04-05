<?php

use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route::post('/logout','logout');

Auth::routes();

// Route::get('/register','register');
// Route::get('/login','login')->name('login');
// Route::post('/login/process','process');
// Route::post('/logout','logout');

Route::get('/register', [UserController::class, 'register']);
Route::post('/store',[UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login/process', [UserController::class, 'process']);
Route::post('/logout', [UserController::class, 'logout']);

Route::group(['middleware' => ['isSuperAdmin']], function () {
    Route::controller(UserController::class)->group(function(){

            Route::get('/manage', 'manage');
            Route::post('/add/user','fetchUser');
            Route::put('/user/{user}','update');
            Route::delete('/user/{user}','destroy');

        });

    Route::controller(RoleUserController::class)->group(function(){
            Route::post('/assign/role','storedata');
            Route::delete('/role/{role}','destroy');

        });

});

Route::group(['middleware' => ['isAdmin']], function () {
    Route::controller(ProductsController::class)->group(function(){
            Route::get('/','index');
            // Route::get('/add/product','create');
            Route::post('/add/product','storedata');
            Route::put('/product/{product}','update');
            Route::delete('/product/{product}','destroy');

        });
});

Route::group(['middleware' => ['isAdmin']], function () {

    Route::controller(CategoriesController::class)->group(function(){
            Route::get('/category', 'category');
            Route::post('/add/category','storedata');
            Route::put('/category/{category}','updateCategory');
            Route::delete('/category/{category}','destroy');

});

});
// Route::controller(UserController::class)->group(function(){

//     Route::get('/register','register');
//     Route::get('/login','login')->name('login');
//     Route::post('/login/process','process');
//     Route::post('/logout','logout');

//     Route::get('/manage', 'manage')->middleware('role:SuperAdmin');
//     Route::post('/add/user','fetchUser')->middleware('role:SuperAdmin');
//     Route::post('/store','store')->middleware('role:SuperAdmin');
//     Route::put('/user/{user}','update')->middleware('role:SuperAdmin');
//     Route::delete('/user/{user}','destroy')->middleware('role:SuperAdmin');

// });

// Route::controller(ProductsController::class)->group(function(){
//     Route::get('/','index')->middleware('isAdmin');
//     // Route::get('/add/product','create');
//     Route::post('/add/product','storedata');
//     Route::put('/product/{product}','update');
//     Route::delete('/product/{product}','destroy');

// });

// Route::controller(CategoriesController::class)->group(function(){
//     Route::get('/category', 'category')->middleware('role:Admin');
//     Route::post('/add/category','storedata')->middleware('role:Admin');
//     Route::put('/category/{category}','updateCategory')->middleware('role:Admin');
//     Route::delete('/category/{category}','destroy')->middleware('role:Admin');

// });

// Route::controller(RoleUserController::class)->group(function(){
//     Route::post('/assign/role','storedata')->middleware('auth','role:Admin');
//     Route::delete('/role/{role}','destroy')->middleware('auth','role:Admin');

// });


// Route::controller(ViewerController::class)->group(function(){
//     Route::get('/','home');

// })->middleware('auth','role:Viewer');

// Route::group(['middleware' => ['role:Admin']], function () {
//     Route::get('/', [ProductsController::class, 'index']);
// });
