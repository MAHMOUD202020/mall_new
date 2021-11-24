<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Api\StoreController;
use App\Http\Controllers\Web\Api\AuthController;
use App\Http\Controllers\Web\Api\FavoriteController;
use App\Http\Controllers\Web\Api\CartController;
use App\Http\Controllers\Web\Api\OrderController;
use App\Http\Controllers\Web\Api\CategoryController;
use App\Http\Controllers\Web\Api\FAQController;
use App\Http\Controllers\Web\Api\ContactInfoController;
use App\Http\Controllers\Web\Api\BoardController;
use App\Http\Controllers\Web\Api\CouponController;
use App\Http\Controllers\Web\Api\ShippingAddressController;


////////////////////////////////// start  auth /////////////////////////////////////////////

Route::post('login', [AuthController::class , 'login']);
Route::post('register', [AuthController::class , 'register']);
Route::post('logout', [AuthController::class , 'logout']);
Route::post('refresh', [AuthController::class , 'refresh']);
Route::get('profile', [AuthController::class , 'userProfile']);
Route::post('edit-profile', [AuthController::class , 'editProfile']);
Route::post('change-password', [AuthController::class , 'changePassword']);
Route::post('check-phone', [AuthController::class , 'checkPhone']);
Route::post('forgot-password', [AuthController::class , 'forgotPassword']);
Route::post('remove-account', [AuthController::class , 'removeAccount']);
Route::post('custom-remove-account', [AuthController::class , 'customRemoveAccount']);

////////////////////////////////// end  auth /////////////////////////////////////////////


///////////////////////////////// start categories /////////////////////////////////////

Route::get('get-all-categories' , [CategoryController::class , 'getAllCategories']);

Route::get('get-stores-pagination-where-Categories' , [CategoryController::class , 'getStoresPagination']);

///////////////////////////////// end categories /////////////////////////////////////

///////////////////////////////// start stores /////////////////////////////////////

Route::get('get-all-stores' , [StoreController::class , 'getAllStores']);

Route::get('get-stores-pagination' , [StoreController::class , 'getStoresPagination']);

Route::get('get-single-store' , [StoreController::class , 'singleStore']);

Route::get('get-products-pagination' , [StoreController::class , 'getProductsPagination']);

Route::get('store-faq' , [FAQController::class , 'index']);

Route::get('store-contact-info' , [ContactInfoController::class , 'index']);

///////////////////////////////// end stores /////////////////////////////////////

///////////////////////////////// start favorite /////////////////////////////////////

Route::post('get-products-favorite' , [FavoriteController::class , 'getMyProductsFavorite']);

Route::post('get-all-favorite-id' , [FavoriteController::class , 'getAllFavoriteId']);

Route::post('toggle-favorite' , [FavoriteController::class , 'saveOrRemove']);

///////////////////////////////// end favorite /////////////////////////////////////

///////////////////////////////// start  cart ///////////////////////////////////////
Route::post('/get-myCarts',[ CartController::class , "getCarts"]);

Route::post('/save-cart',[ CartController::class , "saveCart"]);

Route::post('/update-quantity-cart',[ CartController::class , "updateQuantityCart"]);

Route::post('/delete-cart',[ CartController::class , "deleteCart"]);

Route::post('/clear-carts',[ CartController::class , "clear"]);

///////////////////////////////// end  cart ///////////////////////////////////////

///////////////////////////////// start  order ///////////////////////////////////////

Route::post('/get-order', [OrderController::class , "getOrder"]);

Route::post('/get-products-order', [OrderController::class , "getCartsOrder"]);

Route::post('/get-orders', [OrderController::class , "getOrders"]);

Route::post('/save-order', [OrderController::class , "saveOrder"]);

Route::post('check-coupon' , [CouponController::class , 'checkCoupon']);

///////////////////////////////// end  order ///////////////////////////////////////

///////////////////////////////////////// end order /////////////////////////////////////////////////

Route::post('get-myShipping-address' , [ShippingAddressController::class , 'index']);

Route::post('save-myShipping-address' , [ShippingAddressController::class , 'save']);

Route::post('update-myShipping-address' , [ShippingAddressController::class , 'update']);

Route::post('delete-myShipping-address' , [ShippingAddressController::class , 'delete']);

///////////////////////////////////////// start student ///////////////////////////////////////////////


///////////////////////////////// ads /////////////////////////////////////////////

Route::get('get-all-board' , [BoardController::class , 'getAll']);

Route::get('get-all-board-with-media' , [BoardController::class , 'getAllWithMedia']);

Route::get('get-all-board-on-floor' , [BoardController::class , 'getAllOnFloor']);

Route::get('get-all-board-on-hall' , [BoardController::class , 'getAllOnHall']);

Route::get('get-monitor' , [BoardController::class , 'getMonitor']);

Route::get('get-monitor-by-id' , [BoardController::class , 'getMonitorById']);

////////////////////////////////////////////////////////////////////////////////////
