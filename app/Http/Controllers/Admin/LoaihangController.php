<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Sanpham;
use App\Loaihang;
use App\Khachhang;
use App\Thuonghieu;
use DB;

class LoaihangController extends Controller
{
	public function getthem()
    {
        return view('Update.themloaihang');
    }


    public function postthem(Request $rq)
    {
    	$loaihang = new Loaihang();

    	$loaihang->Namelh = $rq->Namelh;

    	$loaihang->save();

	return redirect('admin/loaihang')->with('them','Đã thêm một loại hàng mới !');

    }

    public function xoa($ID_Loaihang)
    {
    	$loaihang = Loaihang::find($ID_Loaihang);
        $loaihang->delete();
        return redirect('admin/loaihang')->with('xoa','Xóa loại hàng thành công !');
    }
    public function getsua($ID_Loaihang)
    {
    	$data = DB::table('loaihang')->where('ID_Loaihang', $ID_Loaihang)->get();
        return view('Update.sualoaihang')->with([
            'loaihang'   => $data ,
        ]);
    }
     public function postsua($ID_Loaihang,Request $rq)
    {
    	$loaihang = Loaihang::find($ID_Loaihang);
    	$loaihang->Namelh = $rq->Namelh;

    	$loaihang->save();

	return redirect('admin/loaihang')->with('sua','Sửa thành công loại hàng !');

    }
}
