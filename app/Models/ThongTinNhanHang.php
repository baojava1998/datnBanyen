<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThongTinNhanHang extends Model
{
    //
    protected $table = "thongtin_nhanhang";

    protected $fillable = [
        'idUser', 'idHoaDon', 'Ten','DiaChi','ThanhPho','sdt'
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
