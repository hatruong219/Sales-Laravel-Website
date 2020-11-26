<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    protected $table ='khachhang';
    protected $primaryKey = 'ID_User';

	public function hoadon()
    {
        return $this->hasMany('App\Hoadon','ID_User','ID_Hoadon');
    }
    public function binhluan()
	{
		return $this->hasMany('App\Binhluan','ID_User','ID_Bl');
	}}
