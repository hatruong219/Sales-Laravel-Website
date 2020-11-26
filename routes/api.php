<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('trangchu_dienthoai', 'Api\TrangchuController@trangchudt');
Route::get('trangchu_maytinh', 'Api\TrangchuController@trangchumt');
Route::get('trangchu_linkkien', 'Api\TrangchuController@trangchulk');
Route::post('dangnhap','Api\Dangnhap_Controller@postLogin');
Route::POST('dangky','Api\Dangnhap_Controller@postRegister');
Route::POST('chitietsanpham','Api\TrangchitietController@getdata');
Route::POST('listproduct','Api\TrangtatcasanphamController@getdata');
Route::get('listnoti', 'Api\TrangchuController@listnoti');



Route::POST('listproduct','Api\DemoController@getdata');
Route::POST('canhan','Api\TrangcanhanController@getdata');
Route::POST('addproduct','Api\GiohangController@addproduct');
Route::POST('listcart','Api\GiohangController@listcart');
Route::POST('listcomment','Api\GiohangController@listcomment');
Route::POST('changecart','Api\GiohangController@changecart');
Route::POST('paycart','Api\GiohangController@paycart');

Route::POST('addcomment','Api\TrangchitietController@addcomment');
Route::POST('inforoncomment','Api\TrangchitietController@inforoncomment');