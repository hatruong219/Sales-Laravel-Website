<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitiet_hd extends Model
{
    protected $table ='chitiet_hd';
    protected $primaryKey = 'ID_Chitiethd';

	public function sanpham()
    {
        return $this->hasOne('App\Sanpham','ID_Sanpham','ID_Sanpham');
    }
    public function hoadon()
	{
		return $this->belongsTo('App\Hoadon','ID_Hoadon','ID_Hoadon');
	}
}
