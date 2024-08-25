<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SellerController;

// ADMIN ROUTE 

Route::get('/admin',function (){
    return view('admin.login');
});
Route::get('/admin/dashboard',[LoginController::class,'adminDashboard']);
Route::post('/admin/login',[LoginController::class,'adminLogin']);  
Route::get('/admin/logout',[LoginController::class,'logout']);

// PROTECTED ROUTE 
Route::get('/admin/customers',[CustomerController::class,'customerPage']);

Route::get('/admin/view-sellers',[SellerController::class,'sellerPage']);