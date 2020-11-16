<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = "sanpham";

    public function theloai()
    {
        return $this->belongsTo('App\Models\TheLoai','idLoaiSanPham','id');
    }
    public function ctsanpham()
    {
        return $this->belongsTo('App\Models\ChiTietSanPham','idSanPham','id');
    }
    public function hinh()
    {
        return $this->hasMany('App\Models\HinhSanPham','idSanPham','id');
    }
}
