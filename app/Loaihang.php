<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaihang extends Model
{
    protected $table ='loaihang';
    protected $primaryKey = 'ID_Loaihang';

	public function thuonghieu()
    {
        return $this->hasMany('App\Thuonghieu','ID_Loaihang','ID_Thuonghieu');
    }
}
