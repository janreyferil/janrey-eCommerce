<?php

use App\Model\User\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return User::all();
});

//User Route
$router->get('users','User\UsersController@index');
$router->get('user/{id}','User\UsersController@show');
$router->post('user','User\UsersController@store');
$router->put('user/{id}','User\UsersController@update');
$router->delete('user/{id}','User\UsersController@destroy');

$router->group(['prefix'=>'role'],function () use ($router) {

    //User Route
    $router->post('users','User\RoleUserController@index');
    $router->get('user/{id}','User\RoleUserController@show');
    $router->post('user','User\RoleUserController@store');
    $router->put('user/{id}','User\RoleUserController@update');
    $router->delete('user/{id}','User\RoleUserController@destroy');

});

//Category Route
$router->get('categories','Product\CategoriesController@index');
$router->get('category/{id}','Product\CategoriesController@show');
$router->post('category','Product\CategoriesController@store');
$router->put('category/{id}','Product\CategoriesController@update');
$router->delete('category/{id}','Product\CategoriesController@destroy');

//Tag Route
$router->get('tags','Product\TagsController@index');
$router->get('tag/{id}','Product\TagsController@show');
$router->post('tag','Product\TagsController@store');
$router->put('tag/{id}','Product\TagsController@update');
$router->delete('tag/{id}','Product\TagsController@destroy');

//Product Route
$router->group(['prefix'=>'product'],function () use ($router) {

    //Product Status Route
    $router->get('statuses','Product\ProductStatusesController@index');
    $router->get('status/{id}','Product\ProductStatusesController@show');
    $router->post('status','Product\ProductStatusesController@store');
    $router->put('status/{id}','Product\ProductStatusesController@update');
    $router->delete('status/{id}','Product\ProductStatusesController@destroy');

    //Category Product Status Route
    $router->get('categories','Product\CategoryProductsController@index');
    $router->get('category/{id}','Product\CategoryProductsController@show');
    $router->post('category','Product\CategoryProductsController@store');
    $router->put('category/{id}','Product\CategoryProductsController@update');
    $router->delete('category/{id}','Product\CategoryProductsController@destroy');

    //Tag Product Status Route
    $router->get('tags','Product\ProductTagsController@index');
    $router->get('tag/{id}','Product\ProductTagsController@show');
    $router->post('tag','Product\ProductTagsController@store');
    $router->put('tag/{id}','Product\ProductTagsController@update');
    $router->delete('tag/{id}','Product\ProductTagsController@destroy');

});

 //Product Status Route
 $router->get('products','Product\ProductsController@index');
 $router->get('product/{id}','Product\ProductsController@show');
 $router->post('product','Product\ProductsController@store');
 $router->put('product/{id}','Product\ProductsController@update');
 $router->delete('product/{id}','Product\ProductsController@destroy');

//Session Route
$router->get('sessions','Sale\SessionsController@index');
$router->get('session/{id}','Sale\SessionsController@show');
$router->post('session','Sale\SessionsController@store');
$router->put('session/{id}','Sale\SessionsController@update');
$router->delete('session/{id}','Sale\SessionsController@destroy');

//Coupon Route
$router->get('coupons','Sale\CouponsController@index');
$router->get('coupon/{id}','Sale\CouponsController@show');
$router->post('coupon','Sale\CouponsController@store');
$router->put('coupon/{id}','Sale\CouponsController@update');
$router->delete('coupon/{id}','Sale\CouponsController@destroy');

//Sale Route
$router->group(['prefix'=>'sales'],function () use ($router) {

    // Sales Order
    $router->get('orders','Sale\SalesOrdersController@index');
    $router->get('order/{id}','Sale\SalesOrdersController@show');
    $router->post('order','Sale\SalesOrdersController@store');
    $router->put('order/{id}','Sale\SalesOrdersController@update');
    $router->delete('order/{id}','Sale\SalesOrdersController@destroy');

});

//Order Route
$router->group(['prefix'=>'order'],function () use ($router) {

    // Product Route
    $router->get('products','Sale\OrderProductsController@index');
    $router->get('product/{id}','Sale\OrderProductsController@show');
    $router->post('product','Sale\OrderProductsController@store');
    $router->put('product/{id}','Sale\OrderProductsController@update');
    $router->delete('product/{id}','Sale\OrderProductsController@destroy');

});

//CC Route
$router->group(['prefix'=>'cc'],function () use ($router) {

    // Transaction Route
    $router->get('transactions','Sale\CcTransactionsController@index');
    $router->get('transaction/{id}','Sale\CcTransactionsController@show');
    $router->post('transaction','Sale\CcTransactionsController@store');
    $router->put('transaction/{id}','Sale\CcTransactionsController@update');
    $router->delete('transaction/{id}','Sale\CcTransactionsController@destroy');

});
