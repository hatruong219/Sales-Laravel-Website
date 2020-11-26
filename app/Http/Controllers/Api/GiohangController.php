<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sanpham;
use App\Giohang;
use App\Chitiet_hd;
use App\Hoadon;
use DB;
use Session;
use Carbon\Carbon;

class GiohangController extends Controller
{
    public function addproduct(Request $request)
    {   
        $ID_Sanpham = $request->ID_Sanpham;
        $ID_User = $request->ID_User;
        $ID_Hoadontam = 0;
        $Soluongmua = 0;
        $result = DB::table('hoadontam')->WHERE('ID_User', '=', $ID_User)->Where('ID_Sanpham', '=', $ID_Sanpham)->get();
        foreach ($result as $row)
            {
                $ID_Hoadontam = $row->ID_Hoadontam;
                $Soluongmua = $row->Soluongmua;
            }

        if ($ID_Hoadontam!='0') 
        {
            
            foreach ($result as $row)
            {
                $ID_Hoadontam = $row->ID_Hoadontam;
                $Soluongmua = $row->Soluongmua;
            }
            $Gia = 0;
            $sanpham = DB::table('sanpham')->WHERE('ID_Sanpham', '=', $ID_Sanpham)->get();
            foreach ($sanpham as $row){
                $Gia = $row->Gia;
            }
            DB::table('hoadontam')->where('ID_Hoadontam',$ID_Hoadontam)->update(['Soluongmua'=>$Soluongmua+1, 'Gia'=> $Gia*($Soluongmua+1)]);
        }
        else
        {
            $Gia = 0;
            $sanpham = DB::table('sanpham')->WHERE('ID_Sanpham', '=', $ID_Sanpham)->get();
            foreach ($sanpham as $row)
            {
                $Gia = $row->Gia;

            }
            $giohang = new Giohang();
            $giohang->ID_Sanpham = $ID_Sanpham;
            $giohang->ID_User = $ID_User;
            $giohang->Soluongmua = 1;
            $giohang->Gia = $Gia;
            $giohang->save();
            return response()->json([
                "status"=> true,
            ]);
        }




    }

    // danh sách sản phẩm trong giỏ hàng 
    public function listcart(Request $request)
    {  
        $ID_User = $request->ID_User;

        $data = DB::table('hoadontam')->join('sanpham', 'sanpham.ID_Sanpham', '=', 'hoadontam.ID_Sanpham')->join('thuonghieu', 'thuonghieu.ID_Thuonghieu', '=', 'sanpham.ID_Thuonghieu')->Where('hoadontam.ID_User','=', $ID_User)->get();
        return response()->json([
        
            "data"=> $data,
        ]);
     }






     public function changecart(Request $request)
    {   
        $ID_Sanpham = $request->ID_Sanpham;
        $ID_User = $request->ID_User;
        $ValueChange = $request->ValueChange;


        $ID_Hoadontam = 0;
        $Soluongmua = 0;
        $result = DB::table('hoadontam')->WHERE('ID_User', '=', $ID_User)->Where('ID_Sanpham', '=', $ID_Sanpham)->get();

        foreach ($result as $row)
        {
            $ID_Hoadontam = $row->ID_Hoadontam;
            $Soluongmua = $row->Soluongmua;
        }
        $Gia = 0;
        $sanpham = DB::table('sanpham')->WHERE('ID_Sanpham', '=', $ID_Sanpham)->get();
        foreach ($sanpham as $row){
            $Gia = $row->Gia;
        }
        if($ValueChange == "addvalue"){
            DB::table('hoadontam')->where('ID_Hoadontam',$ID_Hoadontam)->update(['Soluongmua'=>$Soluongmua+1, 'Gia'=> $Gia*($Soluongmua+1)]);
            return response()->json([
                "status"=> true,
            ]);
        }
        elseif ($ValueChange == "subvalue") {
            if ($Soluongmua == 1) {
                $giohang = Giohang::find($ID_Hoadontam);
                $giohang->delete();           
                return response()->json([
                "status"=> true,
            ]); 
            } else {
                DB::table('hoadontam')->where('ID_Hoadontam',$ID_Hoadontam)->update(['Soluongmua'=>$Soluongmua-1, 'Gia'=> $Gia*($Soluongmua-1)]);
                return response()->json([
                "status"=> true,
            ]);
            }
            
        }
        else
        {
            $giohang = Giohang::find($ID_Hoadontam);
            $giohang->delete();  
            return response()->json([
                "status"=> true,
            ]);
        }
    }


     public function listcomment(Request $request)
    {  
        $ID_Sanpham = $request->ID_Sanpham;

        $data = DB::table('binhluan')->join('sanpham', 'sanpham.ID_Sanpham', '=', 'binhluan.ID_Sanpham')->join('khachhang', 'khachhang.ID_User', '=', 'binhluan.ID_User')->Where('binhluan.ID_Sanpham','=', $ID_Sanpham)->get();
        return response()->json([
        
            "data"=> $data,
        ]);
     }


     public function paycart(Request $request)
    {  
        $ID_User = $request->ID_User;
        $result = DB::table('hoadontam')->WHERE('ID_User', '=', $ID_User)->get();
        $total =0;
        foreach ($result as $row)
        {
            $Gia = $row->Gia;
            $total += $Gia;
        }
        $hoadon = new Hoadon();
        $hoadon->Ngaymua = Carbon::now();
        $hoadon->ID_User = $ID_User;
        $hoadon->Tongtien = $total;
        $hoadon->Trangthai = "Đã thanh toán";
        $hoadon->save();
        
        $ID_Hoadon = Hoadon::all()->max('ID_Hoadon');
        if ($ID_Hoadon>=1) 
        {
            $ID_Hoadon = $ID_Hoadon;
        }
        else
        {
            $ID_Hoadon=1;
        }

        $result1 = DB::table('hoadontam')->WHERE('ID_User', '=', $ID_User)->get();
        foreach ($result1 as $row1)
        {
            $ID_Hoadontam = 0;
            $ID_Hoadontam = $row1->ID_Hoadontam;

            $ID_Sanpham = 0;
            $ID_Sanpham = $row1->ID_Sanpham;
            $Soluongmua = 0;
            $Soluongmua = $row1->Soluongmua;
            $Gia = 0;
            $Gia = $row1->Gia;


            $new = new Chitiet_hd();
            $new->ID_Sanpham = $ID_Sanpham;
            $new->Soluongmua = $Soluongmua;
            $new->Gia = $Gia;
            $new->ID_Hoadon =$ID_Hoadon;
            $new->save();

            
            $giohang = Giohang::find($ID_Hoadontam);
            $giohang->delete();  
        }

        return response()->json([
                "status"=> true,
                "sadga"=>$result,
                "ID_Hoadontam"=>$ID_Hoadontam,
                "ID_Sanpham"=>$ID_Sanpham,
                "Soluongmua"=>$Soluongmua,
                "Gia"=>$Gia,
            ]);


    }
     

}

    