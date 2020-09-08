<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        //route admin products ---------------------///----------------Route----------------------//
        Route::get('/articles', 'Admin\AdminArticlesController@index')->name('admin.articles.index');
        Route::get('/articles/create', 'Admin\AdminArticlesController@create')->name('admin.articles.create');
        Route::post('/articles', 'Admin\AdminArticlesController@store')->name('admin.articles.store');
        Route::get('/articles/{article}/edit', 'Admin\AdminArticlesController@edit')->name('admin.articles.edit');
        Route::get('/articles/show/{article}', 'Admin\AdminArticlesController@show')->name('admin.articles.show');
        Route::patch('/articles/{article}', 'Admin\AdminArticlesController@update')->name('admin.articles.update');
        Route::delete('/articles/{article}', 'Admin\AdminArticlesController@destroy')->name('admin.articles.destroy');

         //-------------------------------------------------Route categories--------------------------------------//
         Route::get('/categories', 'Admin\AdminCategoryController@index')->name('admin.categories.index');
         Route::get('/categories/create', 'Admin\AdminCategoryController@create')->name('admin.categories.create');
         Route::post('/categories', 'Admin\AdminCategoryController@store')->name('admin.categories.store');
         Route::get('/categories/{category}/edit', 'Admin\AdminCategoryController@edit')->name('admin.categories.edit');
         Route::patch('/categories/update/{category}', 'Admin\AdminCategoryController@update')->name('admin.categories.update');
         Route::delete('/categories/delete/{category}', 'Admin\AdminCategoryController@destroy')->name('admin.categories.destroy');
        //---------------------------------------------------Route premiums--------------------------------------//
         Route::get('/premiums', 'Admin\AdminPremiumsController@index')->name('admin.premiums.index');
         Route::patch('/premiums/{article}', 'Admin\AdminPremiumsController@update')->name('admin.premiums.update');
         Route::delete('/premiums/{article}', 'Admin\AdminPremiumsController@destroy')->name('admin.premiums.destroy');

        //---------------------------------------------------Route premiums comments--------------------------------------//
        Route::get('/premiums/comments', 'Admin\AdminPremiumsCommentairesController@index')->name('admin.comments.index');
        Route::patch('/premiums/comments/{comment}', 'Admin\AdminPremiumsCommentairesController@update')->name('admin.comments.update');
        Route::delete('/premiums/comments/{comment}', 'Admin\AdminPremiumsCommentairesController@destroy')->name('admin.comments.destroy');



        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

    });

});