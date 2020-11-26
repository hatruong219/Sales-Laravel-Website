<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sanpham;
use App\User;
use App\Binhluan;
use App\Khachhang;
use DB;
use Session;  


class TrangchuController extends Controller
{
   	public function index()
    {
        $data = DB::table('sanpham')->paginate(8);   // lấy hết dữ liệu trong bảng
        return view('User.trangchu')->with([
            'data'   => $data
        ]);
    }
    public function thuonghieusp($ID_Thuonghieu)
    {
        $data = DB::table('sanpham')->where('ID_Thuonghieu',$ID_Thuonghieu)->paginate(8);   // lấy hết dữ liệu trong bảng
        return view('User.trangchu')->with([
            'data'   => $data
        ]);
    }
    public function search(Request $rq)
    {
        $keyword = $rq->search;
        $soluong = DB::table('sanpham')->where('Namesp', 'like', '%'.$keyword.'%')->count();
        $data = DB::table('sanpham')->where('Namesp', 'like', '%'.$keyword.'%')->paginate(8);   // lấy hết dữ liệu trong bảng
        return view('User.trangchu')->with([
          'soluongsp' => $soluong,
          'data'   => $data,
        ]);
    }
    public function searchgia(Request $rq)
    {
        $giadau = $rq->giadau;
        $giacuoi = $rq->giacuoi;

        $soluong = DB::table('sanpham')->whereBetween('Gia', [$giadau, $giacuoi])->count();
        $data = DB::table('sanpham')->whereBetween('Gia', [$giadau, $giacuoi])->paginate(8);   // lấy hết dữ liệu trong bảng
        return view('User.trangchu')->with([
          'soluongsp' => $soluong,
          'data'   => $data,
        ]);
    }
    public function chitietsp($ID_Sanpham)
    {
        $data = DB::table('sanpham')->where('ID_Sanpham', $ID_Sanpham)->get();
        $binhluan = DB::table('binhluan')->join('khachhang', 'binhluan.ID_User', '=', 'khachhang.ID_User')->where('ID_Sanpham', $ID_Sanpham)->orderBy('ID_Bl', 'desc')->get();
        return view('User.chitietsp')->with([
          'data'=>$data,
          'binhluan' => $binhluan,
          'idsp' => $ID_Sanpham
      ]);
    }
    public function binhluan(Request $rq, $ID_Sanpham)
    {
        $ID_User = Session::get('khachhangid');

        $binhluan = new Binhluan();
        $binhluan->Noidung = $rq->bl;
        $binhluan->ID_User = $ID_User;
        $binhluan->ID_Sanpham = $ID_Sanpham;
        $binhluan->Ngaybl = now();
        $binhluan->save();
        return redirect('user/chitietsp/'.$ID_Sanpham);
    }
    public function getthongtin()
    {
        $slbl=0;
        $slhd=0;
        $ID_User = Session::get('khachhangid');
        $slbl = DB::table('binhluan')->where('ID_User', $ID_User)->count();
        $slhd = DB::table('hoadon')->where('ID_User', $ID_User)->count();
        $data = DB::table('khachhang')->where('ID_User', $ID_User)->get();
        return view('User.thongtin')->with([
            'slbl'=>$slbl,
            'slhd'=>$slhd,
            'khachhang'=>$data
        ]);
    }
    public function postthongtin(Request $rq)
    {
        $ID_User = Session::get('khachhangid');
        $slhd1 = $rq->Anhdaidien;
        $slhd2 = $rq->Phone;
        $slhd3 = $rq->Name;
        $file = $rq->Anhdaidien;

        $khachhang = khachhang::find($ID_User);
        $khachhang->Name = $rq->Name;
        if ($file!=null) {
            $khachhang->Anhdaidien = $file;
        }
        $khachhang->Phone = $rq->Phone;
        $khachhang->Gender = $rq->Gender;
        $khachhang->Address = $rq->Address;
        $khachhang->Pass = $rq->Pass;
        $khachhang->save();
        //tảilại dữ liệu
        return redirect('user/thongtin')->with('sua','Cập nhật thông tin thành công !');
    }
    //quản lý sản phẩm theo danh mục
    

}
