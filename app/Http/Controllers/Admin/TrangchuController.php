<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Sanpham;
use App\Loaihang;
use App\Khachhang;
use App\Thuonghieu;

class TrangchuController extends Controller
{
    public function index()
    {
        $date = getdate();
        $thang = $date['mon'];
        $nam = $date['year'];
        $dauthang = "".$nam.'/'.$thang."/1";
        $cuoithang = "".$nam.'/'.$thang."/30";
        $slhd = DB::table('hoadon')->whereBetween('Ngaymua', [$dauthang, $cuoithang])->count();
        $cthd = DB::table('chitiet_hd')->whereBetween('created_at', [$dauthang, $cuoithang])->get();
        $slspm = DB::table('sanpham')->whereBetween('created_at', [$dauthang, $cuoithang])->count();
        $slsp = 0;
        foreach ($cthd as $row) {
            $slsp += $row->Soluongmua;
        }
        $slkh = DB::table('khachhang')->whereBetween('created_at', [$dauthang,$cuoithang])->count();
        return view('Admin.trangchu')->with([
            'slhd'   => $slhd,
            'slsp'   => $slsp,
            'slkh'   => $slkh,
            'slspm'   => $slspm,
        ]);
    }
    public function loaihang()
    {
        $data = Loaihang::all();// lấy hết dữ liệu trong bảng san pham
        return view('Admin.tkloaisp')->with([
            'loaihang'   => $data
        ]);
    }
    public function thuonghieu()
    {
    	$join = DB::table('thuonghieu')->join('loaihang', 'thuonghieu.ID_Loaihang', '=', 'loaihang.ID_Loaihang')->get();
        $data = Loaihang::all();// lấy hết dữ liệu trong bảng san pham
        return view('Admin.tkthuonghieu')->with([
            'thuonghieu'   => $join,
            'data'=>$data
        ]);
    }
    public function thuonghieucualh($ID_Loaihang)
    {
        $join = DB::table('thuonghieu')->join('loaihang', 'thuonghieu.ID_Loaihang', '=', 'loaihang.ID_Loaihang')->where('thuonghieu.ID_Loaihang', $ID_Loaihang)->get();
        $data = Loaihang::all();

        return view('Admin.tkthuonghieu1',['thuonghieu'=>$join,'data'=>$data]);
    }
    public function sanpham()
    {
    	$join = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->get();

    	$data = Thuonghieu::all();
        return view('Admin.tksanpham',['sanpham'=>$join,'data'=>$data]);
    }
    public function sanphamcuath($ID_Thuonghieu)
    {
    	$join = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->where('sanpham.ID_Thuonghieu', $ID_Thuonghieu)->get();
    	$data = Thuonghieu::all();

        return view('Admin.tksanpham1',['sanpham'=>$join,'data'=>$data]);
    }
    public function hoadon()
    {
    	$join = DB::table('hoadon')->join('khachhang', 'hoadon.ID_User', '=', 'khachhang.ID_User')->get();

        return view('Admin.tkhoadon',['hoadon'=>$join]);
    }
    public function khachhang()
    {
    	$data = Khachhang::All();
        return view('Admin.khachhang',['khachhang'=>$data]);
    }
}
