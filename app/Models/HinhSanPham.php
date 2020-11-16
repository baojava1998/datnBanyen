<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhSanPham extends Model
{
    protected $table = "hinh";
    protected $fillable = [
        'Hinh','idSanPham',
    ];
    public function sanpham()
    {
        return $this->belongsTo('App\Models\SanPham','idSanPham','id');
    }
}
