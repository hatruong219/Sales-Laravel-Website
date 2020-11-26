<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sanpham;
use App\User;
use App\Binhluan;
use App\Khachhang;
use DB;
class TrangchuController extends Controller
{
    public function trangchudt()
    {
    	$data = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->join('loaihang', 'thuonghieu.ID_Loaihang', '=', 'loaihang.ID_Loaihang')->Where('loaihang.ID_Loaihang','1')->orderBy('ID_Sanpham', 'desc')->LIMIT('8')->get();
        return $data;
    }
    public function trangchumt()
    {
    	$data = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->join('loaihang', 'thuonghieu.ID_Loaihang', '=', 'loaihang.ID_Loaihang')->Where('loaihang.ID_Loaihang','2')->orderBy('ID_Sanpham', 'desc')->LIMIT('8')->get();
        return $data;
    }
    public function trangchulk()
    {
    	$data = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->join('loaihang', 'thuonghieu.ID_Loaihang', '=', 'loaihang.ID_Loaihang')->Where('loaihang.ID_Loaihang','3')->orderBy('ID_Sanpham', 'desc')->LIMIT('8')->get();
        return $data;
    }

    public function listnoti()
    {
        $data = DB::table('thongbao')->get();
        return $data;
    }
 

}
