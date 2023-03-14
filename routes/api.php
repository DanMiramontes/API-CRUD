<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('categories')->group(function (){
    Route::get('list',[CategoryController::class,'index']);
    Route::get('{id}',[CategoryController::class,'show']);
    Route::post('',[CategoryController::class,'store']);
    Route::put('{id}',[CategoryController::class,'update']);
    Route::delete('{id}',[CategoryController::class,'destroy']);

});


Route::prefix('store')->group(function (){
    Route::get('list',[StoreController::class,'index']);
    Route::get('{id}',[StoreController::class,'show']);
    Route::post('',[StoreController::class,'store']);
    Route::put('{id}',[StoreController::class,'update']);
    Route::delete('{id}',[StoreController::class,'destroy']);

});


Route::prefix('product')->group(function (){
    Route::get('list',[ProductController::class,'index']);
    Route::get('{id}',[ProductController::class,'show']);
    Route::post('',[ProductController::class,'store']);
    Route::put('{id}',[ProductController::class,'update']);
    Route::delete('{id}',[ProductController::class,'destroy']);

});
