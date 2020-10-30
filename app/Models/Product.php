<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = "prod_id";
    protected $fillable = ['prod_name', 'prod_price', 'prod_image', 'prod_status', 'prod_description', 'prod_featured', 'prod_discount', 'prod_cate'];

    public function products_cate() {
        return $this->belongsTo('App\ProductCate', 'prod_cate', 'cate_id');
    }
}
