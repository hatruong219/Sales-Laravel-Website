<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sanpham;
use App\User;
use App\Binhluan;
use App\Khachhang;
use DB;


class DemoController extends Controller
{
    public function getdata(Request $request)
    {
    	$ID_Loaihang = $request->ID_Loaihang;

    	$data = DB::table('sanpham')->join('thuonghieu', 'sanpham.ID_Thuonghieu', '=', 'thuonghieu.ID_Thuonghieu')->join('loaihang', 'thuonghieu.ID_Loaihang', '=', 'loaihang.ID_Loaihang')->Where('loaihang.ID_Loaihang','=', $ID_Loaihang)->get();

        // cấp bậc sao
        $star=array();
        foreach ($data as $row)
        {
        	$temp = DB::table('binhluan')->Where('ID_Sanpham',$row->ID_Sanpham)->Avg("Capbac");
        	if ($temp != null) {
        		$star[$row->ID_Sanpham]=DB::table('binhluan')->Where('ID_Sanpham',$row->ID_Sanpham)->Avg("Capbac");
        	} else {
        		$star[$row->ID_Sanpham]=0;
        	}

        }

        //số lượng comment
        $comment=array();
        foreach ($data as $row)
        {
            $comment[$row->ID_Sanpham]=DB::table('binhluan')->Where('ID_Sanpham',$row->ID_Sanpham)->count();
        }
        return response()->json([
        
            "data"=> $data,
            "star"=> $star,
            "comment"=> $comment,
        ]);
    }
}
