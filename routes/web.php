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

//ĐỐI VỚI ADMIN
//đăng nhập và xử lý đăng nhập.
Route::get('admin/login', [ 'as' => 'login', 'uses' => 'Admin\LoginController@getLogin']);
Route::post('admin/login', [ 'as' => 'login', 'uses' => 'Admin\LoginController@postLogin']);
Route::get('admin/logout', [ 'as' => 'logout', 'uses' => 'Admin\LogoutController@Logout']);

//Quản lý trong Admin
Route::get('admin/trangchu','Admin\TrangchuController@index')->name('trangchuadmin');
Route::get('admin/loaihang','Admin\TrangchuController@loaihang');
Route::get('admin/thuonghieu','Admin\TrangchuController@thuonghieu');
Route::get('admin/thuonghieu/{ID_Loaihang}','Admin\TrangchuController@thuonghieucualh');
Route::get('admin/sanpham','Admin\TrangchuController@sanpham');
Route::get('admin/sanpham/{ID_Thuonghieu}','Admin\TrangchuController@sanphamcuath');
Route::get('admin/hoadon','Admin\TrangchuController@hoadon');
Route::get('admin/khachhang','Admin\TrangchuController@khachhang');
Route::get('admin/loinhuan','Admin\ThongkeController@getloinhuan');
Route::post('admin/loinhuan','Admin\ThongkeController@postloinhuan');
Route::get('admin/chitiet_hd','Admin\ThongkeController@chitiet_hd');
Route::get('admin/chitiet_hd/{ID_Hoadon}','Admin\ThongkeController@chitiethd');
Route::get('admin/hdtn','Admin\ThongkeController@hdtn');
Route::get('admin/khtn','Admin\ThongkeController@khtn');
Route::get('admin/spdbtn','Admin\ThongkeController@spdbtn');
Route::get('admin/spmtn','Admin\ThongkeController@spmtn');

//them , sua , xoa  Loại hàng
Route::get('admin/themlh','Admin\LoaihangController@getthem');
Route::post('admin/themlh','Admin\LoaihangController@postthem');
Route::get('admin/xoalh/{ID_Loaihang}','Admin\LoaihangController@xoa');
Route::get('admin/sualh/{ID_Loaihang}','Admin\LoaihangController@getsua');
Route::post('admin/sualh/{ID_Loaihang}','Admin\LoaihangController@postsua');
//them , sua , xoa  Thương hiệu
Route::get('admin/themth','Admin\ThuonghieuController@getthem');
Route::post('admin/themth','Admin\ThuonghieuController@postthem');
Route::get('admin/xoath/{ID_Thuonghieu}','Admin\ThuonghieuController@xoa');
Route::get('admin/suath/{ID_Thuonghieu}','Admin\ThuonghieuController@getsua');
Route::post('admin/suath/{ID_Thuonghieu}','Admin\ThuonghieuController@postsua');
//them , sua , xoa  Sản Phẩm
Route::get('admin/themsp','Admin\SanphamController@getthem');
Route::post('admin/themsp','Admin\SanphamController@postthem');
Route::get('admin/xoasp/{ID_Sanpham}','Admin\SanphamController@xoa');
Route::get('admin/suasp/{ID_Sanpham}','Admin\SanphamController@getsua');
Route::post('admin/suasp/{ID_Sanpham}','Admin\SanphamController@postsua');
//them , sua , xoa  Hóa đơn
Route::get('admin/xoahd/{ID_Hoadon}','Admin\HoadonController@xoa');
Route::get('admin/suahd/{ID_Hoadon}','Admin\HoadonController@sua');
Route::post('admin/suahd/{ID_Hoadon}','Admin\HoadonController@sua');
//ĐỐI VỚI KHÁCH HÀNG
// Đăng ký thành viên
Route::get('user/dangki', 'User\RegisterController@getRegister');
Route::post('user/dangki', 'User\RegisterController@postRegister');
// Đăng nhập và xử lý đăng nhập
Route::get('user/login', [ 'as' => 'login', 'uses' => 'User\LoginController@getLogin']);
Route::post('user/login', [ 'as' => 'login', 'uses' => 'User\LoginController@postLogin']);
// Đăng xuất
Route::get('user/logout', [ 'as' => 'logout', 'uses' => 'User\LogoutController@getLogout']);
// Trang chu
Route::get('user/trangchu','User\TrangchuController@index');
Route::post('user/search','User\TrangchuController@search');
Route::post('user/searchgia','User\TrangchuController@searchgia');
Route::get('user/chitietsp/{ID_Sanpham}','User\TrangchuController@chitietsp');
Route::get('user/binhluan/{ID_Sanpham}','User\TrangchuController@binhluan');
Route::get('user/thongtin','User\TrangchuController@getthongtin');
Route::post('user/suathongtin','User\TrangchuController@postthongtin');

Route::get('user/thuonghieu/{ID_Thuonghieu}','User\TrangchuController@thuonghieusp');
Route::get('user/thuonghieu/thuonghieu/{ID_Thuonghieu}','User\TrangchuController@thuonghieusp');
//SSGio hang

Route::get('user/giohang', ['as'  => 'giohang', 'uses' =>'User\GiohangController@giohang']);
// them vao gio hang
Route::get('user/giohang/themvaogio/{id}', ['as'  => 'themvaogio', 'uses' =>'User\GiohangController@themvaogio']);

Route::get('user/giohang/suagiohang/{id}/{qty}-{dk}', ['as'  => 'suagiohang', 'uses' =>'User\GiohangController@suagiohang']);

Route::get('user/giohang/xoagiohang/{id}', ['as'  => 'xoasanpham', 'uses' =>'User\GiohangController@xoagiohang']);

Route::get('user/giohang/xoatoanbo', ['as'  => 'xoatoanbo', 'uses' =>'User\GiohangController@xoa']);

Route::get('user/giohang/thanhtoan', ['as'  => 'thanhtoan', 'uses' =>'User\GiohangController@thanhtoan']);



