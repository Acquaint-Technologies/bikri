<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'prevent-back-history'],function(){


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
Route::get('/home', 'IndexController@home')->name('home');


Route::get('/','OwnerController@login')->name('/');
Route::get('/owner-registration','OwnerController@registration')->name('owner-register');
Route::post('/save-register','OwnerController@saveRegister')->name('save-register');
Route::post('/Owner-login','OwnerController@saveLogin')->name('save-login');
Route::get('/Owner-logout','OwnerController@logOut')->name('owner-logout');

Route::get('change-password', 'ChangePasswordController@index')->name('lets change');
Route::post('change', 'ChangePasswordController@store')->name('change.password');






//Route::get('/product/view','HomeController@viewProduct')->name('view-product');
Route::get('/add-product','ProductController@addProduct')->name('add-product');
Route::post('/save-product','ProductController@saveProduct')->name('save-product');
Route::get('/view-product','ProductController@viewProduct')->name('view-product');
Route::post('update-product', 'ProductController@updateProduct')->name('update-product');
Route::get('/delete-product/{id}', 'ProductController@deleteProduct')->name('delete-product');

Route::get('/add-sale','SaleController@addSale')->name('add-sale');
Route::post('/save-sale','SaleController@saveSale')->name('save-sale');
Route::get('/view-sale','SaleController@viewSale')->name('view-sale');
Route::post('update-sale', 'SaleController@updateSale')->name('update-sale');
Route::get('/delete-sale/{id}', 'SaleController@deleteSale')->name('delete-sale');


Route::post('/multiply','SaleController@multiplyValue')->name('multiply');
Route::post('dynamic_dependent/multiply', 'SaleController@fetch')->name('dynamicdependent.fetch');






//Admin
Route::get('/admin/product-list','ProductController@adminProductList')->name('product-list');


Route::get('/admin/add-btype','BtypeController@addBtype')->name('add-btype');
Route::post('/admin/save-btype','BtypeController@saveBtype')->name('save-btype');
Route::get('/admin/view-btype','BtypeController@viewBtype')->name('view-btype');
Route::get('/admin/btype/published/{id}', 'BtypeController@publishedBtype')->name('published-btype');
Route::get('/admin/btype/unpublished/{id}', 'BtypeController@unpublishedBtype')->name('unpublished-btype');
Route::post('/admin/btype/update-btype', 'BtypeController@updateBtype')->name('update-btype');
Route::get('/admin/btype/delete-btype/{id}', 'BtypeController@deleteBtype')->name('delete-btype');


Route::get('/admin/add-product-category','CategoryController@addProductCategory')->name('add-product-category');
Route::post('/admin/save-product-category','CategoryController@saveProductCategory')->name('save-category');
Route::get('/admin/view-product-category','CategoryController@viewProductCategory')->name('view-product-category');
Route::get('/admin/product-category/published/{id}', 'CategoryController@publishedProductCategory')->name('published-category');
Route::get('/admin/product-category/unpublished/{id}', 'CategoryController@unpublishedProductCategory')->name('unpublished-category');
Route::post('/admin/update-product-category', 'CategoryController@updateProductCategory')->name('update-category');
Route::get('/admin/delete-product-category/{id}', 'CategoryController@deleteProductCategory')->name('delete-category');


});
