<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table ='hoadon';
    protected $primaryKey = 'ID_Hoadon';

	public function khachhang()
    {
        return $this->belongsTo('App\Khachhang','ID_User','ID_User');
    }
    public function chitiet_hd()
	{
		return $this->hasMany('App\Chitiet_hd','ID_Hoadon','ID_Chitiethd');
	}
}
