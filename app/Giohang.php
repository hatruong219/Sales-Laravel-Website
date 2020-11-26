<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
    protected $table ='hoadontam';
    protected $primaryKey = 'ID_Hoadontam';

	public function khachhang()
    {
        return $this->belongsTo('App\Khachhang','ID_User','ID_User');
    }
    public function sanpham()
	{
		return $this->belongsTo('App\Sanpham','ID_Sanpham','ID_Sanpham');
	}
}
