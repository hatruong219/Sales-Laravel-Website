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

class ThuonghieuController extends Controller
{
    public function getthem()
    {
    	$data = Loaihang::all();
        return view('Update.themthuonghieu')->with([
        	'data' => $data
        ]);
    }


    public function postthem(Request $rq)
    {
    	$thuonghieu = new Thuonghieu();

    	$thuonghieu->Nameth = $rq->Nameth;
    	$thuonghieu->Address = $rq->Address;
    	$thuonghieu->Note = $rq->Note;
    	$thuonghieu->ID_Loaihang = $rq->ID_Loaihang;

    	$thuonghieu->save();

	return redirect('admin/thuonghieu')->with('them','Đã thêm một thương hiệu mới !');

    }

    public function xoa($ID_Thuonghieu)
    {
    	$thuonghieu = Thuonghieu::find($ID_Thuonghieu);
        $thuonghieu->delete();
        return redirect('admin/thuonghieu')->with('xoa','Xóa thương hiệu thành công !');
    }
    public function getsua($ID_Thuonghieu)
    {
    	$data = DB::table('thuonghieu')->join('loaihang', 'thuonghieu.ID_Loaihang', '=', 'loaihang.ID_Loaihang')->where('thuonghieu.ID_Thuonghieu', $ID_Thuonghieu)->get();
    	$data2 = Loaihang::all();
        return view('Update.suathuonghieu')->with([
            'thuonghieu'   => $data ,
            'data'         => $data2
        ]);
    }
     public function postsua($ID_Thuonghieu,Request $rq)
    {
    	$thuonghieu = Thuonghieu::find($ID_Thuonghieu);
    	$thuonghieu->Nameth = $rq->Nameth;
    	$thuonghieu->Address = $rq->Address;
    	$thuonghieu->Note = $rq->Note;
    	$thuonghieu->ID_Loaihang = $rq->ID_Loaihang;
    	$thuonghieu->save();

	return redirect('admin/thuonghieu')->with('sua','Sửa thành công loại hàng !');

    }

}
