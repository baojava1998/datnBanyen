<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    //
    protected $table = "chitiet_sp";

    public function sanpham()
    {
        return $this->belongsTo('App\Models\SanPham','idSanPham','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment','idChiTiet_Sp','id');
    }
}
