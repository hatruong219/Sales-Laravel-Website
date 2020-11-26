<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Sanpham;
use App\Binhluan;
class TrangchitietController extends Controller
{
    public function getdata(Request $request) {
		// lay giu lieu tu form
		$ID_Sanpham = $request->ID_Sanpham;
        $result = DB::table('sanpham')
        ->where('ID_Sanpham', $ID_Sanpham)
        ->first();
        $comment = DB::table('binhluan')
        ->where('ID_Sanpham', $ID_Sanpham)  
        ->count();
        $temp = DB::table('binhluan')
        ->where('ID_Sanpham', $ID_Sanpham)  
        ->avg('Capbac');
        if ($temp != null) {
            $star = DB::table('binhluan')
            ->where('ID_Sanpham', $ID_Sanpham)
            ->avg('Capbac');
        } else {
            $star = 0;
        }


        if ($result) 
        {
            return response()->json([
                "status"=> true,
                "data" => $result,
                "comment" => $comment,
                "star" => $star,
            ]);
        }
        else
        {
            return "fail";
        }
	}





    public function inforoncomment(Request $request) {
        // lay giu lieu tu form
        $ID_Sanpham = $request->ID_Sanpham;
        $result = DB::table('sanpham')
        ->where('ID_Sanpham', $ID_Sanpham)
        ->get();

        if ($result) 
        {
            return response()->json([
                "status"=> true,
                "data" => $result,
            ]);
        }
        else
        {
            return "fail";
        }
    }

    public function addcomment(Request $rq) {
        $binhluan = new Binhluan;
        $binhluan->ID_Sanpham = $rq->ID_Sanpham;
        $binhluan->ID_User = $rq->ID_User;
        $binhluan->Capbac = $rq->Capbac;
        $binhluan->Noidung = $rq->Noidung;
        $binhluan->Ngaybl = $rq->Ngaybl;
        $binhluan->save();
        return response()->json([
            "status"=> true,

        ]);

    }
}
