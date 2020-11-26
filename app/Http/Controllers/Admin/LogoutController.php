<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;


class LogoutController extends Controller
{
	public function Logout() {
    	Session()->flush();
    	return redirect('admin/login');
    }
}
