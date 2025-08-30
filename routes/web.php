<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');

// admin routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    // category
    Route::get('/create_category',[CategoryController::class,'create'])->name('create_category');
    Route::post('/store_category',[CategoryController::class,'store'])->name('store_category');
    Route::get('/index_category',[CategoryController::class,'index'])->name('index_category');
    Route::get('/edit_category/{id}',[CategoryController::class,'edit'])->name('edit_category');
    Route::post('/update_category/{id}',[CategoryController::class,'update'])->name('update_category');
    Route::delete('/delete_category/{id}',[CategoryController::class,'destroy'])->name('delete_category');

    //sub_category
    Route::get('/create_sub_category',[SubCategoryController::class,'create'])->name('create_sub_category');
    Route::post('/store_subcategory',[SubCategoryController::class,'store'])->name('store_subcategory');
    Route::get('/index_sub_category',[SubCategoryController::class,'index'])->name('index_sub_category');
    Route::get('/edit_sub_category/{id}',[SubCategoryController::class,'edit'])->name('edit_sub_category');
    Route::post('/update_sub_category/{id}',[SubCategoryController::class,'update'])->name('update_sub_category');
    Route::delete('/delete_sub_category/{id}',[SubCategoryController::class,'destroy'])->name('delete_sub_category');

    // brand
   Route::get('/create_brand',[BrandController::class,'create'])->name('create_brand');
   Route::post('/store_brand',[BrandController::class,'store'])->name('store_brand');
   Route::get('/index_brand',[BrandController::class,'index'])->name('index_brand');
   Route::get('/edit_brand/{id}',[BrandController::class,'edit'])->name('edit_brand');
   Route::post('/update_brand/{id}',[BrandController::class,'update'])->name('update_brand');
   Route::delete('/delete_brand/{id}',[BrandController::class,'destroy'])->name('delete_brand');


   // Product
   Route::get('/create_product',[ProductController::class,'create'])->name('create_product');
   Route::post('/store_product',[ProductController::class,'store'])->name('store_product');
   Route::get('/index_product',[ProductController::class,'index'])->name('index_product');
   Route::get('/edit_product/{id}',[ProductController::class,'edit'])->name('edit_product');
   Route::post('/update_product/{id}',[ProductController::class,'update'])->name('update_product');
   Route::delete('/delete_product/{id}',[ProductController::class,'destroy'])->name('delete_product');
   
   
    // logout route
    Route::post('/logout', function () {
    Auth::guard('web')->logout(); // 👈 এইটাই আসল জিনিস

    session()->invalidate();
    session()->regenerateToken();

    return redirect('/');
    })->name('logout');

});
