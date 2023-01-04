<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/register',[UserController::class, 'registration']);
// Route::post('/login',[UserController::class, 'login']);
// Route::get('/login',[UserController::class, 'login']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
    Route::get('/user-profile', [UserController::class, 'userProfile']);
    Route::post('/change-pass', [UserController::class, 'changePassWord']);

});


Route::group([
    'middleware' => 'api',
    'prefix' => 'order'
],
 function() {

    //add new order to cart;
    Route::post('/newOrder',[OrderController::class,'addNewOrder']);

    //checkout all order in cart
    Route::get('/checkoutAll',[OrderController::class,'checkoutAllOrder']);

    //Get all orrder of user  ()
    Route::get('/getMyOrder',[OrderController::class,'getMyOrders']);

    Route::get('/deleteorder',[OrderController::class,'deleteOrderById']);

    Route::get('/increaseOrder',[OrderController::class,'increaseOrdersAmount']);
    Route::get('/decreaseOrder',[OrderController::class,'decreaseOrdersAmount']);


});

Route::group([
    'prefix' => 'products'
],
    function() {

        // get all product.
        Route::get('/getAllProducts',[ProductsController::class,'getAll']);

        //get one product
        Route::post('/getOneProduct',[ProductsController::class,'getOne']);

        // get product by category . Need id category.
        Route::get('/getByCategory',[ProductsController::class,'getByCategory']);

        // search product
        Route::get('/searchfood',[ProductsController::class,'searchFoodbyName']);
       
    }
);

Route::group([
    'prefix' => 'shops'
],
    function() {

        // get all shop.
        Route::get('/getAllShops',[ShopController::class,'getAllShop']);

    }
);


