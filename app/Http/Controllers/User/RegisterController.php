<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Khachhang;
use Session;
use DB;

class RegisterController extends Controller
{
    public function getRegister() {
		return view('User.dangki');
	}
	public function postRegister(Request $rq) {
		$sql = null;
		$Phone = $rq->Phone;
		$Pass1 = $rq->Pass1;
		$Pass2 = $rq->Pass2;
		$sql = DB::table('khachhang')->where('Phone', $Phone)->get();
		if ($Pass1!=$Pass2) {
			return redirect('user/dangki')->with('thongbao','Nhập lại mật khẩu sai!! Ngu vậy??');
		}
		elseif ($sql == []) {
			return redirect('user/dangki')->with('thongbao','Rất tiếc số điện thoại đã được dùng để đăng kí!!');
		}
		else{
			$Anhdaidien ='1480044449_635918156584359185_s7-g1.jpg';
			$khachhang = new Khachhang();

	    	$khachhang->Name = $rq->Name;
	    	$khachhang->Phone = $rq->Phone;
	    	$khachhang->Gender = $rq->Gender;
	    	$khachhang->Address = $rq->Address;
	    	$khachhang->Anhdaidien = $Anhdaidien;
	    	$khachhang->Pass = $rq->Pass1;
	    	$khachhang->save();
	    	return redirect('user/dangki')->with('thongbao','OK Đăng nhập đi nhóc con!!!');
		}
		
	}
}
