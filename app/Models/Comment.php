<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "Comment";

    public function ctsanpham()
    {
        return $this->belongsTo('App\Models\TinTuc','idChiTiet_Sp','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
