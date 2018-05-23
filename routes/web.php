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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::resource('categories', 'CategoriesController');
    Route::get('categories/deleted/all', 'CategoriesController@deleted')->name('categories.deleted');

    Route::post('categories/deleted/{id}/restore', 'CategoriesController@restore')->name('categories.restore');
    Route::post('categories/deleted/{id}/restoreall', 'CategoriesController@restoreall')->name('categories.restoreall');

    Route::get('categories/{id}/items', 'CategoriesController@items')->name('category.items');


    Route::resource('materials', 'MaterialsController');
    Route::get('materials/deleted/all', 'MaterialsController@deleted')->name('materials.deleted');
    Route::post('materials/deleted/{id}/restore', 'MaterialsController@restore')->name('materials.restore');


    Route::resource('items', 'ItemsController');
    Route::get('items/deleted/all', 'ItemsController@deleted')->name('items.deleted');
    Route::post('items/deleted/{id}/restore', 'ItemsController@restore')->name('items.restore');
}
);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
