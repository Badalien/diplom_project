<?php

Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['web']], function () {
    // client
    Route::group(['namespace' => 'Client'], function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        Route::get('/home', 'HomeController@index')->name('home');

        // profile
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@show')->name('profile');
            Route::get('/edit', 'ProfileController@edit');
            Route::post('/edit', 'ProfileController@save');
            Route::get('/password', 'ProfileController@password');
            Route::put('/password', 'ProfileController@passwordChange');
        });

        // news
        Route::group(['prefix' => 'news'], function () {
            Route::get('/', 'NewsController@show')->name('news');
            Route::group(['middleware' => ['App\Http\Middleware\CheckClient']], function () {
                Route::get('/create', 'NewsController@add');
                Route::post('/', 'NewsController@create');
                Route::get('/edit/{id}', 'NewsController@detail');
                Route::put('/{id}', 'NewsController@save');
                Route::delete('/{id}', 'NewsController@delete');
            });
            Route::get('/{id}', 'NewsController@detail');
        });

        // schedules
        Route::group(['prefix' => 'schedules'], function () {//todo
            Route::get('/', 'SchedulesController@show')->name('schedules');
            Route::get('/edit', 'SchedulesController@edit');
            Route::post('/save', 'SchedulesController@save');
        });

        // portfolio
        Route::group(['prefix' => 'portfolio'], function () {//todo
            Route::get('/', 'PortfolioController@show')->name('portfolio');
            Route::put('/{id}', 'PortfolioController@save');
        });

        // contacts
        Route::group(['prefix' => 'contacts'], function () {//todo
            Route::get('/', 'ContactsController@show')->name('contacts');
            Route::get('/edit', 'ContactsController@edit');
            Route::post('/save', 'ContactsController@save');
        });

        // group
        Route::group(['prefix' => 'groups'], function () {//todo
            Route::get('/', 'GroupController@show');
            Route::get('/create', 'GroupController@add');
            Route::post('/', 'GroupController@create');
            Route::put('/{id}', 'GroupController@save');
        });

        // methodical material
        Route::group(['prefix' => 'materials'], function () {//todo
            Route::get('/', 'MethodicalMaterialController@show')->name('materials');
            Route::get('/create', 'MethodicalMaterialController@add');
            Route::post('/', 'MethodicalMaterialController@create');
            Route::get('/{id}', 'MethodicalMaterialController@detail');
            Route::put('/{id}', 'MethodicalMaterialController@save');
        });

        // tasks
        Route::group(['prefix' => 'tasks'], function () {//todo
            Route::get('/', 'TasksController@show');
            Route::get('/create', 'TasksController@add');
            Route::post('/', 'TasksController@create');
            Route::get('/{id}', 'TasksController@detail');
            Route::put('/{id}', 'TasksController@save');
        });
    });
});

Auth::routes();
