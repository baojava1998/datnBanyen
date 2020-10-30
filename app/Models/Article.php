<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $primaryKey = "art_id";
    protected $fillable = ['art_title', 'art_slug', 'art_description', 'art_content', 'art_cate'];

    public function articles_cate() {
        return $this->belongsTo('App\ArticleCate', 'art_cate', 'cate_id');
    }
}
