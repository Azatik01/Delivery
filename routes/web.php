<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CafeController as AdminCafeController;
use App\Http\Controllers\Admin\FoodController as AdminFoodController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\KitchenController as AdminKitchenController;


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

Route::get('/admin', [AdminCafeController::class, 'index']);
Route::name('admin.')->prefix('admin')->group(function(){
    Route::resources([
        'cafes' => AdminCafeController::class,
        'foods' => AdminFoodController::class,
        'categories' => AdminCategoryController::class,
        'kitchens' => AdminKitchenController::class
    ]);
});

Auth::routes();
Route::get('/', [CafeController::class, 'index']);
Route::resource('cafes', CafeController::class)->only('index', 'show');
Route::resource('foods', FoodController::class)->only('index', 'show');
Route::resource('baskets',  BasketController::class)->except('show');
Route::get('/baskets/delete', [BasketController::class, 'deleteAll']);
