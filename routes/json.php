<?php

Route::group(['prefix' => 'json', 'as' => 'json.', 'namespace' => 'JsonCon'], function () {
    Route::get('get-subscription-amount','SubscriptionController@getSubscriptionAmount')->name('get-subscription-amount');
});
