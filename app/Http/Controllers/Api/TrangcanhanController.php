<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Sanpham;
use App\Binhluan;

class TrangcanhanController extends Controller
{
	public function getdata(Request $request) {
		// lay giu lieu tu form
		$ID_User = $request->ID_User;
        $result = DB::table('khachhang')
        ->where('ID_User', $ID_User)
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

    
}
