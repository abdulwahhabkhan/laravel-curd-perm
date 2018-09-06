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

    if(!Auth::guest()){
        return redirect()->route('home');
    } else
        return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::group(['prefix'=>'config', 'module'=>'Config', 'icon' => 'fa fa-cog', 'middleware'=>['auth','permission']], function()
{
    Route::get('user', ['uses'=>'User\UserController@index', 'as'=>'user.list', 'menu'=>true, 'protected'=>true ]);
    Route::get('role', ['uses'=>'User\RoleController@index', 'as'=>'role.list', 'menu'=>true, 'protected'=>true ]);
    Route::get('group', ['uses'=>'User\GroupController@index', 'as'=>'group.list', 'menu'=>true, 'protected'=>true ]);
    Route::resource('user', 'User\UserController',['except'=>['index']]);
    Route::resource('group', 'User\GroupController',['except'=>['index']]);
    Route::resource('role', 'User\RoleController',['except'=>['index']]);
});

Route::group(['prefix'=>'sales', 'module'=>'Sales', 'icon'=>'fa fa-money', 'middleware'=>['auth','permission']], function(){
    Route::get('customer', ['uses'=>'Sales\CustomerController@index', 'as'=>'customer.list', 'menu'=>true, 'protected'=>true]);
    Route::get('customer/autocomplete', ['uses'=>'Sales\CustomerController@autocomplete', 'as'=>'customer.autocomplete']);
    Route::get('sale', ['uses'=>'Sales\SaleController@index', 'as'=>'sale.list', 'menu'=>true, 'protected'=>true]);
    Route::resource('customer', 'Sales\CustomerController', ['except'=>['index']]);
    Route::resource('sale', 'Sales\SaleController', ['except'=>['index']]);
});


