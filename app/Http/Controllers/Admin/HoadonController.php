<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Sanpham;
use App\Loaihang;
use App\Khachhang;
use App\Thuonghieu;
use App\Hoadon;
use DB;

class HoadonController extends Controller
{
    public function xoa($ID_Hoadon)
    {
    	$thuonghieu = Hoadon::find($ID_Hoadon);
        $thuonghieu->delete();
        return redirect('admin/hoadon')->with('xoa','Xóa hóa đơn thành công !');
    }
     public function sua($ID_Hoadon,Request $rq)
    {
    	$Trangthaidh = $rq->Trangthaidh;
 
    	DB::table('hoadon')->where('ID_Hoadon',$ID_Hoadon)->update(['Trangthaidh'=> $rq->Trangthaidh]);

		return redirect('admin/hoadon')->with('sua','Sửa thành công hóa đơn !');

    }
}
