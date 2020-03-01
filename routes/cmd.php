<?php

/*
|--------------------------------------------------------------------------
| Artisan Commands
|--------------------------------------------------------------------------
|
| Here is where you can artisan commands from the route url
|
|
|
*/

//Clear Cache facade value:
Route::get('reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    return '<center><h1>System Rebooted!</h1></center>';
});
