<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Khachhang;

class Dangnhap_Controller extends Controller
{
    public function postLogin(Request $request) {
		// lay giu lieu tu form
		$Phone = $request->Phone;
        $Pass = $request->Pass;

        $result = DB::table('khachhang')
        ->where('Phone', $Phone)
        ->where('Pass', $Pass)
        ->first();

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
    public function postRegister(Request $rq) {
        $Anhdaidien ='1480044449_635918156584359185_s7-g1.jpg';
        $Address = 'Việt Nam';
        $khachhang = new Khachhang;
        $khachhang->Name = $rq->Name;
        $khachhang->Phone = $rq->Phone;
        $khachhang->Gender = $rq->Gender;
        $khachhang->Address = $Address;
        $khachhang->Anhdaidien = $Anhdaidien;
        $khachhang->Pass = $rq->Pass;
        $khachhang->Trangthai = "0";
        $khachhang->save();
        return response()->json([
            "status"=> true,

        ]);

    }
}
