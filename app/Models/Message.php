<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = "messages";
    protected $fillable = ['from', 'to', 'message', 'is_read'];
    public function users()
    {
        return $this->belongsTo('App\Models\User','from','id');
    }
}
