<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCate extends Model
{
    protected $table = 'articles_cate';
    protected $primaryKey = 'cate_id';
    protected $fillable = ['cate_name'];

    public function article() {
        return $this->hasMany('App\Article', 'art_cate', 'cate_id');
    }
}
