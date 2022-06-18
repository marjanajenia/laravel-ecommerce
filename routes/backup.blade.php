Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');

Route::get('/blank', function () {
    return view('backend.blank');
});
// Route::get('/add', function () {
//     return view('backend.pages.product.addproduct');
// });

   // for product
Route::group(['prefix'=>'/product'],function(){
	Route::post('/add','App\Http\Controllers\Backend\ProductController@store')->name('add');

    Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('create');

    Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('manage');

    Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('edit');

     Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('update');

     Route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('delete');
});

// for category
Route::group(['prefix'=>'/category'],function(){
	Route::post('/categorystore','App\Http\Controllers\Backend\CategoryController@store')->name('categorystore');

    Route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->name('categorycreate');

    Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('categorymanage');

    Route::get('/categoryedit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('categoryedit');
    
    Route::get('/categoryshow','App\Http\Controllers\Backend\CategoryController@show')->name('categoryshow');

    Route::post('/categoryupdate/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('categoryupdate');

    Route::get('/categorydelete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('categorydelete');
});

