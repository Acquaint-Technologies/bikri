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

/**
 * Artisan Commands Routes
 */
include 'cmd.php';

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'prevent-back-history'],function(){


Auth::routes();

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

Route::group(['namespace' => 'FrontEndCon'], function () {
    Route::get('subscription-payments', 'SubscriptionPaymentController@index')->name('subscription-payments.index');
    Route::post('subscription-payments', 'SubscriptionPaymentController@store')->name('subscription-payments.store');
});

    /**
     * Admin related routes
     */
    include 'admin.php';

    /**
     * JSON Response routes
     */
    include 'json.php';
});
