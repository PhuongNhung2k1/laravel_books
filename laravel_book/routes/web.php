<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Products\ProductsController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Orders\OrdersController;

use App\Http\Controllers\Customer\HomeCustomController;
use App\Http\Controllers\Customer\LoginCustomController;
use App\Http\Controllers\Customer\RegisterCustomController;
use App\Http\Controllers\Customer\ProductsCustomController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware;
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


//===================================BACKEND===============================================

//Middleware for the backend routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login',  [LoginController::class, 'loginPost'])->name('admin.loginPost');
});

Route::group(['prefix' => 'admin', 'middleware' => 'adminRole'], function () {
    //logout
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('logout', [LoginController::class, 'logout']);
    //categories
    Route::group(['prefix' => 'categories','namespace'=>'Categories'], function () { 
        Route::get("/", [CategoriesController::class, "read"]);
        Route::get("/update/{id}", [CategoriesController::class, "update"]);
        Route::post("/update/{id}", [CategoriesController::class, "updatePost"]);
        Route::get("/create", [CategoriesController::class, "create"]);
        Route::post("/create", [CategoriesController::class, "createPost"]);
        Route::get("/delete/{id}", [CategoriesController::class, "delete"]);
      });
   
    //product
    Route::group(['prefix' => 'products', 'namespace' => 'Products'], function () {
        Route::get("/", [ProductsController::class, "read"]);
        Route::get("/update/{id}", [ProductsController::class, "update"]);
        Route::post("/update/{id}", [ProductsController::class, "updatePost"]);
        Route::get("/create", [ProductsController::class, "create"]);
        Route::post("/create", [ProductsController::class, "createPost"]);
        Route::get("/delete/{id}", [ProductsController::class, "delete"]);
    });
    //list users
    Route::group(['prefix' => 'users', 'namespace' => 'Products'], function () {
        Route::get("/", [UsersController::class, "read"]);
        Route::get("/create", [UsersController::class, "create"]);
        Route::post("/create", [UsersController::class, "createPost"]);
        Route::get("/update/{id}", [UsersController::class, "update"]);
        Route::post("/update/{id}", [UsersController::class, "updatePost"]);
        Route::get("/delete/{id}", [UsersController::class, "delete"]);
    });
    //order 
    Route::group(['prefix' => 'orders', 'namespace' => 'Products'], function () {
        Route::get("/", [OrdersController::class, "read"]);
        Route::get("/detail/{id}", [OrdersController::class, "getDetail"]);
    });
    //news
    Route::group(['prefix' => 'news', 'namespace' => 'Products'], function () {
        Route::get("/", [NewsController::class, "read"]);
        Route::get("/update/{id}", [NewsController::class, "update"]);
        Route::post("/update/{id}", [NewsController::class, "updatePost"]);
        Route::get("/create", [NewsController::class, "create"]);
        Route::post("/create", [NewsController::class, "createPost"]);
        Route::get("/delete/{id}", [NewsController::class, "delete"]);
    });
});

//===================================FRONTEND===============================================
Route::get('customer/login',function(){
    return view("frontend.account.login");
});

Route::get('customer/register', function () {
    return view("frontend.account.register");
});

//Home
Route::get('home', [HomeCustomController::class, 'home'])->name('home');
//login
Route::group(['prefix' => 'customer'], function () {
    Route::post('/login', [LoginCustomController::class, 'loginpost'])->name('loginPost');
    Route::get('/logout', [LoginCustomController::class, 'logout'])->name('logout');

    Route::post('/register', [RegisterCustomController::class, 'register'])->name("register");

    //Home page
    Route::get('/checkout', [HomeCustomController::class, 'customer']);
    //product
    Route::get('/products/detail/{id}', [ProductsCustomController::class, 'detail']);
    Route::get('/categories/{cateID}', [ProductsCustomController::class, 'getByCate']);

    // Cart
    Route::get('/cart', [CartController::class, 'viewCart'])->name('viewCart');
    Route::post('/cart', [CartController::class, 'orderPost']);

    Route::get('/order', [OrderController::class, 'orders']);
    Route::post('/order', [OrderController::class, 'orderPost'])->name("orderPost");
    Route::get('/orderDetail/{id}', [CartController::class, 'orderDetail']);
    Route::get('/orderSuceess', [CartController::class, 'orderSuceess']);
    Route::get('/delete/{id}', [CartController::class, 'delete']);
});
Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('update{id}/{quantity}', [CartController::class, 'update'])->name('cart.update');
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
}
);