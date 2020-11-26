<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class LoginController extends Controller
{
    public function getLogin() {
		return view('User.login');
	}

	public function postLogin(Request $request) {
		$Phone = $request->Phone;
        $Pass = $request->Pass;

        $result = DB::table('khachhang')
        ->where('Phone', $Phone)
        ->where('Pass', $Pass)
        ->first();

        if ($result) 
        {
            $request->session()->put(['khachhang'=> $result->Name ,'khachhangid'=>$result->ID_User]);
            return redirect( 'user/trangchu');
        }
        else
        {
            return redirect('user/login')->with('errors','Tên tài khoản hoặc mật khẩu không chính xác !');
        
        }
	}
}
