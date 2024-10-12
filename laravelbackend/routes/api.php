<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;

Route::get('/student',[StudentController::class, 'index']);

// Route::get('/productpage',[ProductController::class, 'productPage']);

Route::get('/products', [ProductController::class, 'index']); 
Route::post('/products',[ProductController::class, 'productPage']);
Route::put('/products/{id}',[ProductController::class, 'update']);
Route::delete('/products/{id}',[ProductController::class, 'destroy']);