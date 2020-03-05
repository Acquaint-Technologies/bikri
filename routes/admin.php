<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'administrator'], function () {
    Route::group(['as' => 'admin.', 'namespace' => 'BackEndCon'], function () {
        // Admin Authentication Routes...
        Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\AdminLoginController@login');
        Route::post('logout', 'Auth\AdminLoginController@logout')->name('logout');
    });

    // Routes with auth:admin guard
    Route::group(['middleware' => 'auth:admin', 'namespace' => 'BackEndCon'], function () {
        Route::get('/', 'HomeController@index')->name('admin');

        Route::get('/product-list', 'ProductController@adminProductList')->name('product-list');

        Route::get('/add-btype', 'BtypeController@addBtype')->name('add-btype');
        Route::post('/save-btype', 'BtypeController@saveBtype')->name('save-btype');
        Route::get('/view-btype', 'BtypeController@viewBtype')->name('view-btype');
        Route::get('/btype/published/{id}', 'BtypeController@publishedBtype')->name('published-btype');
        Route::get('/btype/unpublished/{id}', 'BtypeController@unpublishedBtype')->name('unpublished-btype');
        Route::post('/btype/update-btype', 'BtypeController@updateBtype')->name('update-btype');
        Route::get('/btype/delete-btype/{id}', 'BtypeController@deleteBtype')->name('delete-btype');

        Route::get('/add-product-category', 'CategoryController@addProductCategory')->name('add-product-category');
        Route::post('/save-product-category', 'CategoryController@saveProductCategory')->name('save-category');
        Route::get('/view-product-category', 'CategoryController@viewProductCategory')->name('view-product-category');
        Route::get('/product-category/published/{id}', 'CategoryController@publishedProductCategory')->name('published-category');
        Route::get('/product-category/unpublished/{id}', 'CategoryController@unpublishedProductCategory')->name('unpublished-category');
        Route::post('/update-product-category', 'CategoryController@updateProductCategory')->name('update-category');
        Route::get('/delete-product-category/{id}', 'CategoryController@deleteProductCategory')->name('delete-category');
    });
});
