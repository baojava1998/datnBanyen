<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password', 'phone'];

    public function role() {
        return $this->belongsTo('App\Role', 'role', 'role_id');
    }
}
