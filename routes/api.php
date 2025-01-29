<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CoffeeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello world! harsh']);
});

Route::get('/customers', [CustomerController::class, 'index']); 
Route::post('/customers',[CustomerController::class,'store']);
Route::get('/coffees', [CoffeeController::class, 'index']); 
Route::post('/coffees', [CoffeeController::class, 'store']); 
Route::put('/coffees/{id}', [CoffeeController::class, 'update']); 
Route::delete('/coffees/{id}', [CoffeeController::class, 'destroy']); 
