<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thuonghieu extends Model
{
    protected $table ='thuonghieu';
    protected $primaryKey = 'ID_Thuonghieu';

	public function loaihang()
    {
        return $this->belongsTo('App\Loaihang','ID_Loaihang','ID_Loaihang');
    }
    public function sanpham()
	{
		return $this->hasMany('App\Sanpham','ID_Thuonghieu','ID_Sanpham');
	}
}
