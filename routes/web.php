<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\socialmediaLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// .....................social media................
Route::get('/togoogle',[socialmediaLogin::class,'togoogle'])->name('togoogle');
Route::get('/google/login',[socialmediaLogin::class,'googleinfostore']);

Route::get('/tofacebook',[socialmediaLogin::class,'tofacebook'])->name('tofacebook');
Route::get('/facebook/login',[socialmediaLogin::class,'facebookinfostore']);

Route::get('/admin', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('frontend.dashboard');
})->name('fonted');

  



Route::group(['prefix'=>'/admin'],function(){
    // for product
    Route::group(['prefix'=>'/product'],function(){
        Route::post('/add','App\Http\Controllers\Backend\ProductController@store')->middleware(['auth'])->name('add');

        Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->middleware(['auth'])->name('create');

        Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->middleware(['auth'])->name('manage');

        Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->middleware(['auth'])->name('edit');

        Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->middleware(['auth'])->name('update');

        Route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->middleware(['auth'])->name('delete');
    });

    // for category
    Route::group(['prefix'=>'/category'],function(){
        Route::post('/categorystore','App\Http\Controllers\Backend\CategoryController@store')->middleware(['auth'])->name('categorystore');

        Route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->middleware(['auth'])->name('categorycreate');

        Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->middleware(['auth'])->name('categorymanage');

        Route::get('/categoryedit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->middleware(['auth'])->name('categoryedit');
        
        Route::get('/categoryshow','App\Http\Controllers\Backend\CategoryController@show')->middleware(['auth'])->name('categoryshow');

        Route::post('/categoryupdate/{id}','App\Http\Controllers\Backend\CategoryController@update')->middleware(['auth'])->name('categoryupdate');

        Route::get('/categorydelete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->middleware(['auth'])->name('categorydelete');
    });

    // for sub category
    Route::group(['prefix'=>'/subcategory'],function(){
        Route::post('/subcategorystore','App\Http\Controllers\Backend\SubcategoryController@store')->middleware(['auth'])->name('subcategorystore');

        Route::get('/subcreate','App\Http\Controllers\Backend\SubcategoryController@create')->middleware(['auth'])->name('subcategorycreate');

        Route::get('/submanage','App\Http\Controllers\Backend\SubcategoryController@index')->middleware(['auth'])->name('subcategorymanage');

        Route::get('/subcategoryedit/{id}','App\Http\Controllers\Backend\SubcategoryController@edit')->middleware(['auth'])->name('subcategoryedit');        

        Route::post('/subcategoryupdate/{id}','App\Http\Controllers\Backend\SubcategoryController@update')->middleware(['auth'])->name('subcategoryupdate');

        Route::get('/subcategorydelete/{id}','App\Http\Controllers\Backend\SubcategoryController@destroy')->middleware(['auth'])->name('subcategorydelete');
    });

    //for vendor
    Route::group(['prefix'=>'/vendor'],function(){
        Route::post('/Vendorstore','App\Http\Controllers\Backend\VendorController@store')->middleware(['auth'])->name('Vendorstore');

        Route::get('/create','App\Http\Controllers\Backend\VendorController@create')->middleware(['auth'])->name('Vendorcreate');

        Route::get('/manage','App\Http\Controllers\Backend\VendorController@index')->middleware(['auth'])->name('Vendormanage');

        Route::get('/edit/{id}','App\Http\Controllers\Backend\VendorController@edit')->middleware(['auth'])->name('Vendoredit');
        
        Route::get('/show','App\Http\Controllers\Backend\VendorController@show')->middleware(['auth'])->name('Vendorshow');

        Route::post('/update/{id}','App\Http\Controllers\Backend\VendorController@update')->middleware(['auth'])->name('Vendorupdate');

        Route::get('/delete/{id}','App\Http\Controllers\Backend\VendorController@destroy')->middleware(['auth'])->name('Vendordelete');
    });
});



require __DIR__.'/auth.php';
