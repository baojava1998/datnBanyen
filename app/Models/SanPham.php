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

    public function tintuc()
    {
        return $this->hasMany('App\Models\TinTuc','idLoaiSanPham','id');
    }
}
