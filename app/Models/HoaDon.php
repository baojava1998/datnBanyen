<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
    protected $table = "hoadon";

    protected $fillable = [
        'id_KhachHang', 'Tong', 'ThanhToan'
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
