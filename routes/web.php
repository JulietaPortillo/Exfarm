<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('roles', 'RoleController');
Route::post('roles/delete/{id}', 'RoleController@updateState');

Route::resource('users', 'UserController');
Route::post('users/delete/{id}', 'UserController@updateState');

Route::resource('purchases', 'PurchaseController');
Route::post('purchases/delete/{id}', 'PurchaseController@updateState');

Route::resource('sales', 'SaleController', [
    'except' => [ 'create', 'show' ]
]);
Route::get('sales/to-sell/{purchase_id}', 'SaleController@to_sell');
Route::post('sales/delete/{id}', 'SaleController@updateState');

Route::resource('take-weights', 'TakeWeightController', [
    'except' => [ 'index', 'create', 'show' ]
]);
Route::get('take-weights/{purchase_id}', 'TakeWeightController@getWeights')->name('weights.index');
Route::get('take-weights/weight-assign/{purchase_id}', 'TakeWeightController@weight_assign');
Route::post('take-weights/delete/{id}', 'TakeWeightController@updateState');
