<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "loai_sanpham";

    public function loaitin()
    {
        return $this->hasMany('App\Models\LoaiTin','idLoaiSanPham','id');
    }

    public function tintuc()
    {
    return $this->hasManyThrough('App\Models\TinTuc','App\Models\LoaiTin','idLoaiSanPham','idLoaiTin','id');
    }
}
