<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sanpham;
use App\User;
use App\Binhluan;
use App\Khachhang;
use DB;


class TrangtatcasanphamController extends Controller
{
    public function getdata(Request $rq)
    {
        $ID_Loaihang = $rq->ID_Loaihang;
        $array1=array();
        $data = DB::table('sanpham')->get();  

    foreach ($data as $row)
    {
        $array1[$row->ID_Sanpham]=DB::table('binhluan')->Where('ID_Sanpham',$row->ID_Sanpham)->Avg("Capbac");
    }
    return $array1;

    }
}
