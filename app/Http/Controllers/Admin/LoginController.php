<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class LoginController extends Controller
{
    public function getLogin() {
		return view('Admin\login');
	}

	public function postLogin(Request $request) {
		// lay giu lieu tu form
		$Username = $request->UserName;
        $Pass = $request->Pass;

        $result = DB::table('admin')
        ->where('Username', $Username)
        ->where('Pass', $Pass)
        ->first();

        if ($result) 
        {
            $request->session()->put('admin', $result->Name);
            return redirect( Route('trangchuadmin') );
        }
        else
        {
            $request->session()->flash('errors', 'Tài khoản hoặc mật khẩu không chính xác !');
            return redirect('admin/login');
        }
	}
}
