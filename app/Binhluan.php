<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    protected $table ='binhluan';
    

	public function sanpham()
    {
        return $this->belongsTo('App\Sanpham','ID_Sanpham','ID_Sanpham');
    }
    public function khachhang()
	{
		return $this->belongsTo('App\Khachhang','ID_User','ID_User');
	}
}
