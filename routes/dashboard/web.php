<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/index', 'DashboardController@index')->name('index');

            //product routes
            Route::resource('products', 'ProductController');
            Route::get('products/{id}/status', 'ProductController@status');

            //client routes
            //catch routes
            Route::resource('catchs', 'CatchController');

            //user routes

            Route::resource('users', 'UserController');

            //receipt route
            Route::resource('receipts', 'ReceiptController');

            Route::resource('categories', 'CategoryController');
            Route::resource('mangs', 'MangController');
            Route::resource('clients', 'ClientController');
            Route::resource('workers', 'WorkerController');
            Route::resource('records', 'RecordController');
            Route::resource('catchs', 'CatchController');
            //offecs routes
            Route::resource('offecs', 'OffecController');
            //baptists routes
            Route::resource('baptists', 'BaptistController');
            //reporos routes
            Route::resource('reports', 'ReportController');
            //orders routes
            Route::resource('orders', 'OrderController');
            Route::get('order/{id}/status', 'OrderController@status');
            Route::get('external/{id}/status', 'ExternalController@status');
            Route::resource('external', 'ExternalController');
            Route::resource('cashiers', 'CashierController');
            Route::resource('sadads', 'SadadController');
            Route::get('sadads/{id}/status', 'SadadController@status');
        });//end of dashboard routes
    });


