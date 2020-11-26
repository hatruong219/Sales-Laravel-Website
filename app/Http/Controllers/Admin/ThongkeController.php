<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Sanpham;
use App\Loaihang;
use App\Thuonghieu;

class ThongkeController extends Controller
{
    // public function loinhuan()
    // {
    // 	$
    // }
    public function chitiet_hd()
    {
    	$data = DB::table('chitiet_hd')->join('sanpham', 'chitiet_hd.ID_Sanpham', '=', 'sanpham.ID_Sanpham')->get();
    	return view('Admin.Lichsubanhang',['data'=>$data]);
    }
    public function chitiethd($ID_Hoadon)
    {
    	$data = DB::table('chitiet_hd')->join('sanpham', 'chitiet_hd.ID_Sanpham', '=', 'sanpham.ID_Sanpham')->where('ID_Hoadon', $ID_Hoadon)->get();
    	return view('Admin.Lichsubanhang',['data'=>$data]);
    }
    public function getloinhuan()
    {
        $doanhthu=0;
    	$data = DB::table('hoadon')->join('khachhang', 'hoadon.ID_User', '=', 'khachhang.ID_User')->get();
        foreach ($data as $value) {
            $doanhthu += $value->Tongtien;
        }
    	return view('Admin.loinhuan',['hoadon'=>$data,'doanhthu'=>$doanhthu]);
    }
    public function postloinhuan(Request $rq)
    {
        $doanhthu=0;
    	$ngaydau = $rq->ngaydau;
    	$ngaycuoi = $rq->ngaycuoi;
    	$data = DB::table('hoadon')->join('khachhang', 'hoadon.ID_User', '=', 'khachhang.ID_User')->whereBetween('Ngaymua', [$ngaydau, $ngaycuoi])->get();
        foreach ($data as $value) {
            $doanhthu += $value->Tongtien;
        }
    	return view('Admin.loinhuan',['hoadon'=>$data,'doanhthu'=>$doanhthu]);
    }

    public function hdtn()
    {
        $date = getdate();
        $thang = $date['mon'];
        $nam = $date['year'];
        $dauthang = "".$nam.'/'.$thang."/1";
        $cuoithang = "".$nam.'/'.$thang."/30";
        $join = DB::table('hoadon')->join('khachhang', 'hoadon.ID_User', '=', 'khachhang.ID_User')->whereBetween('Ngaymua', [$dauthang, $cuoithang])->get();

        return view('Admin.tkhoadon',['hoadon'=>$join]);
    }
    public function khtn()
    {
        $date = getdate();
        $thang = $date['mon'];
        $nam = $date['year'];
        $dauthang = "".$nam.'/'.$thang."/1";
        $cuoithang = "".$nam.'/'.$thang."/30";

        $data = DB::table('khachhang')->whereBetween('created_at', [$dauthang, $cuoithang])->get();
        return view('Admin.khachhang',['khachhang'=>$data]);
    }
    public function spmtn()
    {
        $date = getdate();
        $thang = $date['mon'];
        $nam = $date['year'];
        $dauthang = "".$nam.'/'.$thang."/1";
        $cuoithang = "".$nam.'/'.$thang."/30";
        $join = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->whereBetween('sanpham.created_at', [$dauthang, $cuoithang])->get();

        $data = Thuonghieu::all();
        return view('Admin.tksanpham',['sanpham'=>$join,'data'=>$data]);
    }
    public function spdbtn()
    {
        $date = getdate();
        $thang = $date['mon'];
        $nam = $date['year'];
        $dauthang = "".$nam.'/'.$thang."/1";
        $cuoithang = "".$nam.'/'.$thang."/30";
        $data = DB::table('chitiet_hd')->join('sanpham', 'chitiet_hd.ID_Sanpham', '=', 'sanpham.ID_Sanpham')->whereBetween('chitiet_hd.created_at', [$dauthang, $cuoithang])->get();
        return view('Admin.Lichsubanhang',['data'=>$data]);
    }


}