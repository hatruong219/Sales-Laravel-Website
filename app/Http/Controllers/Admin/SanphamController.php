<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Sanpham;
use App\Loaihang;
use App\Khachhang;
use App\Thuonghieu;
use DB;

class SanphamController extends Controller
{
    public function getthem()
    {
    	$data = Thuonghieu::all();
        return view('Update.themsanpham')->with([
        	'data' => $data
        ]);
    }


    public function postthem(Request $rq)
    {
    	$sanpham = new Sanpham();

    	$sanpham->Namesp = $rq->Namesp;
    	$sanpham->Image = $rq->Image;
    	$sanpham->Gia = $rq->Gia;
    	$sanpham->Soluong = $rq->Soluong;
    	$sanpham->ID_Thuonghieu = $rq->ID_Thuonghieu;
    	$sanpham->Mota = $rq->Mota;
    	$sanpham->save();

	return redirect('admin/sanpham')->with('them','Đã thêm một sản phẩm mới !');

    }

    public function xoa($ID_Sanpham)
    {
    	$sanpham = Sanpham::find($ID_Sanpham);
        $sanpham->delete();
        return redirect('admin/sanpham')->with('xoa','Xóa thương hiệu thành công !');
    }
    public function getsua($ID_Sanpham)
    {
    	$data = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->where('sanpham.ID_Sanpham', $ID_Sanpham)->get();
    	$data2 = Thuonghieu::all();
        return view('Update.suasanpham')->with([
            'sanpham'   => $data ,
            'data'         => $data2
        ]);
    }
     public function postsua($ID_Sanpham,Request $rq)
    {
        $file = $rq->Image;
    	$sanpham = Sanpham::find($ID_Sanpham);
    	$sanpham->Namesp = $rq->Namesp;

        if ($file!=null) {
            $sanpham->Image = $file;
        }

    	$sanpham->Gia = $rq->Gia;
    	$sanpham->Soluong = $rq->Soluong;
    	$sanpham->Mota = $rq->Mota;
    	$sanpham->ID_Thuonghieu = $rq->ID_Thuonghieu;
    	$sanpham->save();

	return redirect('admin/sanpham')->with('sua','Sửa thành công loại hàng !');

    }
}
