<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    //
    protected $table = "giohang";

    protected $fillable = [
        'SanPham', 'Gia', 'Hinh','idSanPham','SoLuong','idUser','XacNhan'
    ];

    public function ctsanpham()
    {
        return $this->belongsTo('App\Models\SanPham','idSanPham','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
