<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\LoginController;
use App\Http\Middleware\SellerMiddleware;
use App\Http\Controllers\Seller\SellerCategoryController;
use App\Http\Controllers\Seller\SellerProductController;

// FOR TESTING PURPOSE 
Route::get('/clear',function(){
    session()->forget('seller');
});


// THIS IS SELLER ROUTE FILE 
Route::get('/seller',function(){
    return view('seller.login');
})->name('seller.login');
Route::get('/seller/signup',function(){
    return view('seller.signup');
})->name('seller.signup');
Route::post('/seller/signup',[LoginController::class,'signup']);


Route::group(['middleware'=>'seller'],function(){

Route::get('/seller/dashboard',[LoginController::class,'sellerDashboard'])->name('seller.dashboard');
Route::get('/seller/add-category',[SellerCategoryController::class,'addCategoryPage'])->name('seller.addCategoryPage');
Route::get('/seller/view-category',[SellerCategoryController::class,'viewCategory'])->name('seller.viewCategoryPage');
Route::get('/seller/edit-category/{id}',[SellerCategoryController::class,'sellerCategoryEdit'])->name('seller.edit-category.sellerCategoryEdit');
Route::get('/seller/delete-category',[SellerCategoryController::class,'sellerDeleteCategory']);
Route::post('/seller/update-category',[SellerCategoryController::class,'updateCategory']);
Route::get('/seller/change-login-credential',[LoginController::class,'changeCredential'])->name('seller.changeCredential');
Route::post('/seller/change-credential',[LoginController::class,'updateCredential'])->name('seller.updateCredential');
Route::get('/seller/add-product',[SellerProductController::class,'addProductPage'])->name('seller.addProductPage');
Route::post('/seller/add-category',[SellerCategoryController::class,'addCategory']);
Route::post('/seller/add-product',[SellerProductController::class,'productUpload']);
Route::get('/seller/view-product',[SellerProductController::class,'viewProduct'])->name('seller.viewProduct');
Route::get('/seller/delete-product',[SellerProductController::class,'deleteProduct']);
Route::get('/seller/edit-product/{id}',[SellerProductController::class,'userEditPage'])->name('seller.editProduct');
Route::get('/seller/product-filter',[SellerProductController::class,'productFilter'])->name('seller.filterProduct');
Route::post('/seller/update-product',[SellerProductController::class,'updateProduct']);                             
});


Route::post('/seller/signin',[LoginController::class,'login']);
Route::get('/seller/logout',[LoginController::class,'logout'])->name('seller.logout');
