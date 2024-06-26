<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
})->middleware(['auth', 'verified','role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::controller(DashboardController::class)->group(function () {
      Route::get('/admin/dashboard', 'Index')->name('admindashboard');      
  });

  Route::controller(CategoryController::class)->group(function () {
      Route::get('/admin/all-category', 'Index')->name('allcategory');
      Route::get('/admin/add-category', 'AddCategory')->name('addcategory');  
      Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');  
      Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory'); 
      Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory'); 
      Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');  
       
  });

  Route::controller(SubCategoryController::class)->group(function () {
      Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
      Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory'); 
      Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
      Route::get('/admin/edit-subcategory/{id}', 'EditSubCategory')->name('editsubcat');
      Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCategory')->name('deletesubcat');
      Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('updatesubcategory'); 

               
  });

  Route::controller(ProductController::class)->group(function () {
      Route::get('/admin/all-product', 'Index')->name('allproduct');
      Route::get('/admin/add-product', 'AddProduct')->name('addproduct');  
             
  });

  Route::controller(OrderController::class)->group(function () {
      Route::get('/admin/pending-order', 'Index')->name('pendingorder'); 
  });
});

require __DIR__.'/auth.php';
