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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PagesController@index')->name('home');


Route::middleware(['auth'])->group(function () {

    Route::get('admin/dashboard', 'PagesController@dashboard')->name('admin.dashboard');
    
    Route::get('admin/main', 'MainPageController@index')->name('admin.main');
    Route::put('admin/main', 'MainPageController@update')->name('admin.main.update');
    
    Route::get('admin/services/create', 'ServicePageController@create')->name('admin.services.create');
    Route::post('admin/services/create', 'ServicePageController@store')->name('admin.services.store');
    Route::get('admin/services/list', 'ServicePageController@list')->name('admin.services.list');
    Route::get('admin/services/edit/{id}', 'ServicePageController@edit')->name('admin.services.edit');
    Route::post('admin/services/update/{id}', 'ServicePageController@update')->name('admin.services.update');
    Route::delete('admin/services/destroy/{id}', 'ServicePageController@destroy')->name('admin.services.destroy');
    
    Route::get('admin/portfolios/create', 'PortfolioPagesController@create')->name('admin.portfolios.create');
    Route::put('admin/portfolios/create', 'PortfolioPagesController@store')->name('admin.portfolios.store');
    Route::get('admin/portfolios/list', 'PortfolioPagesController@list')->name('admin.portfolios.list');
    Route::get('admin/portfolios/edit/{id}', 'PortfolioPagesController@edit')->name('admin.portfolios.edit');
    Route::post('admin/portfolios/update/{id}', 'PortfolioPagesController@update')->name('admin.portfolios.update');
    Route::delete('admin/portfolios/destroy/{id}', 'PortfolioPagesController@destroy')->name('admin.portfolios.destroy');
    
    Route::get('portfolios/post/{id}', 'PortfolioPagesController@singlePost')->name('portfolios.post');
    
    
    Route::get('admin/abouts/create', 'AboutPagesController@create')->name('admin.abouts.create');
    Route::put('admin/abouts/create', 'AboutPagesController@store')->name('admin.abouts.store');
    Route::get('admin/abouts/list', 'AboutPagesController@list')->name('admin.abouts.list');
    Route::get('admin/abouts/edit/{id}', 'AboutPagesController@edit')->name('admin.abouts.edit');
    Route::post('admin/abouts/update/{id}', 'AboutPagesController@update')->name('admin.abouts.update');
    Route::delete('admin/abouts/destroy/{id}', 'AboutPagesController@destroy')->name('admin.abouts.destroy');
    
});

Route::post('/contact','ContactFormController@store')->name('contact.store');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
