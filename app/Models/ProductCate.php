<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model
{
    protected $table = 'products_cate';
    protected $primaryKey = 'cate_id';
    protected $fillable = ['cate_name'];

    public function product() {
        return $this->hasMany('App\Product', 'prod_cate', 'cate_id');
    }
}
