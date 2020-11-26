<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Sanpham;
use App\Hoadon;
use App\Chitiet_hd;
use DB;
use Session;
use Cart;
use Carbon\Carbon;
class GiohangController extends Controller
{
    public function giohang()
    {
        $total=0;
        $data = Cart::content();
        foreach ($data as $key ) {
            $totalsub = $key->price * $key->qty;
            $total += $totalsub;
        }
        return view('User.cart')->with(['giohang'=>$data, 'total'=>$total]);
    }
    public function themvaogio($id)
    {
        $pro = Sanpham::where('ID_Sanpham',$id)->first();
        Cart::add(['id' => $pro->ID_Sanpham, 'name' => $pro->Namesp, 'qty' => 1, 'price' => $pro->Gia,'weight'=>1,'options' => ['img' => $pro->Image]]);
        return redirect()->route('giohang');
    }

    public function suagiohang($id,$qty,$dk)
    {
        if ($dk=='up') {
            $qt = $qty+1;
            Cart::update($id, $qt);
            return redirect()->route('giohang');
        } 
        elseif ($dk=='down') {
            $qt = $qty-1;
            Cart::update($id, $qt);
            return redirect()->route('giohang');
        } 
        else 
        {
            return redirect()->route('giohang');
        }
    }

    public function xoagiohang($id)
    {
        Cart::remove($id);
        return redirect()->route('giohang');
    }
    public function xoa()
    {
        Cart::destroy();   
        return redirect()->route('giohang');   
    }
    public function thanhtoan()
    {
        $total = 0;
        $ID_Hoadon = Hoadon::all()->max('ID_Hoadon');
        $data = Cart::content();
        foreach ($data as $key ) {
            $totalsub = $key->price * $key->qty;
            $total += $totalsub;
        }

        // them hoa don
        $hoadon = new Hoadon();
        $hoadon->Ngaymua = Carbon::now();
        $hoadon->ID_User = Session::get('khachhangid');
        $hoadon->Tongtien = $total;
        $hoadon->save();
        //them chi tiet hoa don
        if ($ID_Hoadon>=1) 
        {
            $ID_Hoadon = $ID_Hoadon+1;
        }
        else
        {
            $ID_Hoadon=1;
        }

        foreach ($data as $key ) {
            $chitiet_hd = new Chitiet_hd();
            $chitiet_hd->ID_Sanpham = $key->id;
            $chitiet_hd->Soluongmua = $key->qty;
            $chitiet_hd->Gia = $key->price;
            $chitiet_hd->ID_Hoadon = $ID_Hoadon;
            $chitiet_hd->save();
        }

        return redirect()->route('xoatoanbo');
    }

}
