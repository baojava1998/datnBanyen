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


    public function cthoadon()
    {
        return $this->hasOne('App\Models\ChiTietHoaDon','idHoaDon','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_KhachHang','id');
    }
    public function ttnhanhang()
    {
        return $this->hasOne('App\Models\ThongTinNhanHang','idHoaDon','id');
    }
}
