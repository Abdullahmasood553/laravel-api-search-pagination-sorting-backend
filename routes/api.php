<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('products/frontend', [ProductController::class, 'frontend']);
Route::get('products/search_product', [ProductController::class, 'searchProduct']);

Route::post('products/find_multiple_products', [ProductController::class, 'fetchMultipleProducts']);
Route::post('products/add_multiple_products', [ProductController::class, 'addMultipleProducts']);

