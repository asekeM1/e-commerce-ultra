<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

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

Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index')->name('home');
});

Route::controller(ClientController::class)->group(function (){
    Route::get('/category', 'categoryPage')->name('category');
    Route::get('/singleProduct', 'singleProduct')->name('singleProduct');
    Route::get('/addToCart', 'addToCart')->name('addToCart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/profile', 'profile')->name('profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function (){
        Route::get('/admin/dashboard', 'index');
    });
    Route::controller(CategoryController::class)->prefix('admin/categories')->group(function (){
        Route::get('/all', 'index')->name('all-categories');
        Route::get('/add', 'create')->name('add-categories');
        Route::post('/store', 'store')->name('store-categories');
        Route::get('/edit/{id}', 'edit')->name('edit-categories');
        Route::post('/update', 'update')->name('update-categories');
        Route::get('/delete/{id}', 'destroy')->name('delete-categories');
    });
    Route::controller(SubCategoryController::class)->prefix('admin/subcategory')->group(function (){
        Route::get('/all', 'index')->name('all-sub-categories');
        Route::get('/add', 'create')->name('add-sub-categories');
        Route::post('/store', 'store')->name('store-sub-categories');
        Route::get('/edit/{id}', 'edit')->name('edit-subcategory');
        Route::post('/update', 'update')->name('update-sub-categories');
        Route::get('/delete/{id}', 'destroy')->name('delete-sub-categories');
    });
    Route::controller(ProductsController::class)->prefix('admin/products')->group(function (){
        Route::get('/all', 'index')->name('all-products');
        Route::get('/add', 'create')->name('add-product');
        Route::post('/store', 'store')->name('store-product');
        Route::get('/edit/{id}', 'edit')->name('edit-product');
        Route::post('/update', 'update')->name('update-product');
        Route::get('/delete/{id}', 'destroy')->name('delete-product');
    });
    Route::controller(OrdersController::class)->prefix('admin/orders')->group(function (){
        Route::get('/completed', 'index')->name('completed-orders');
        Route::get('/pending', 'pending')->name('pending-orders');
        Route::get('/cancelled', 'cancelled')->name('cancelled-orders');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
