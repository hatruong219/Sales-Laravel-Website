<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table ='sanpham';
    protected $primaryKey = 'ID_Sanpham';

	public function thuonghieu()
    {
        return $this->belongsTo('App\Thuonghieu','ID_Thuonghieu','ID_Thuonghieu');
    }
    public function chitiet_hd()
	{
		return $this->hasOne('App\Chitiet_hd','ID_Sanpham','ID_Chitiethd');
	}
	public function binhluan()
	{
		return $this->hasMany('App\Binhluan','ID_Sanpham','ID_Bl');
	}
}
