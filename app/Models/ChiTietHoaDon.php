<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    //
    protected $table = "chitiet_hdon";

    protected $fillable = [
        'idHoaDon', 'idChiTiet_Sp', 'SoLuong','Gia','SoLuong'
    ];


    public function ctsanpham()
    {
        return $this->belongsTo('App\Models\ChiTietSanPham','idSanPham','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
