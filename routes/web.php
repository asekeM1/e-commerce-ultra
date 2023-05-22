<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function (){
        Route::get('/admin/dashboard', 'index');
    });
    Route::controller(CategoryController::class)->prefix('admin/category')->group(function (){
        Route::get('/all', 'index')->name('all-categories');
        Route::get('/add', 'create')->name('add-category');
        Route::post('/store', 'store')->name('store-category');
        Route::get('/edit/{id}', 'edit')->name('edit-category');
        Route::post('/update', 'update')->name('update-category');
        Route::get('/delete/{id}', 'destroy')->name('delete-category');
    });
    Route::controller(SubCategoryController::class)->prefix('admin/subcategory')->group(function (){
        Route::get('/all', 'index')->name('all-sub-categories');
        Route::get('/add', 'create')->name('add-sub-category');
    });
    Route::controller(ProductsController::class)->prefix('admin/products')->group(function (){
        Route::get('/all', 'index')->name('all-products');
        Route::get('/add', 'create')->name('add-product');
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
