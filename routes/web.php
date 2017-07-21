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


Route::group(['middleware' => 'web'], function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin' ], function () {
        Route::get('home', 'HomeController@index');

        Route::group(['middleware' => 'admin.guest'], function () {
            Route::get('/', 'Auth\LoginController@login');
            Route::get('login', 'Auth\LoginController@showLoginForm');
            Route::post('login', 'Auth\LoginController@login')->name('admin.login');
            // Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
        });

        Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

        Route::resource('/property', 'PropertyController');

        Route::post('/categoryProperty/isProperty', 'CategoryPropertyController@isProperty')->name('categoryProperty.isProperty');
        Route::post('/categoryProperty/isFilter', 'CategoryPropertyController@isFilter')->name('categoryProperty.isFilter');
        Route::resource('/categoryProperty', 'CategoryPropertyController', ['except' => ['update']]);

        Route::resource('/categories', 'CategoriesController');

        Route::get('/product/getProperty/{categoryId}', 'ProductController@getProperty')->name('product.getProperty');
        Route::get('/product/getBottomCategory/{firstCategoryId}', 'ProductController@getBottomCategory')->name('product.getBottomCategory');
        Route::get('/product/addProperties/{id}', 'ProductController@addProperties')->name('product.addProperties');
        Route::post('/product/saveProperties', 'ProductController@saveProperties')->name('product.saveProperties');
        Route::post('/product/search', 'ProductController@search')->name('product.search');
        Route::resource('/product', 'ProductController');
        Route::resource('/admins', 'AdminsController');
        //Route::resource('/productproperty', 'ProductPropertyController');
    });
});
Route::post('logout', 'Auth\LoginController@logout')->name('logout'); // GUEST middleware???

Route::group(['namespace' => 'Auth', 'prefix' => '', 'middleware' => 'guest'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('register');
});

Route::group(['namespace' => 'Customer', 'prefix' => '' ], function () {
    //wishlist
    Route::post('wishlist', 'WishlistController@wishlist')->name('wishlist');
    Route::get('wishlists', 'WishlistController@index')->name('wishlists.index')->middleware('checklogin');
    Route::post('/wishtlist/{id}', 'WishlistController@destroy')->name('wishlist.destroy');
    //search
    Route::get('catalog', 'ProductSearchController@search')->name('search.catalog');
    Route::get('/home/search/list', 'ProductSearchController@searchList')->name('search.list');

    Route::resource('comments', 'CommentsController');
    Route::get('/home/{id}', 'HomeController@show');
    Route::get('/', 'HomeController@index')->name('home');
    //
    Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
    Route::resource('billing', 'BillingController', ['only' => ['store']]);
    Route::resource('carts', 'CartController', ['except' => ['destroy', 'show']]);
    Route::post('carts/destroy', 'CartController@destroy');
    Route::post('carts/update-cart', 'CartController@updateCart');
    Route::post('carts/add-all', 'CartController@addAll')->name('carts.addAll');
    Route::resource('products', 'ProductsController');
});
