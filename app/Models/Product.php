<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo('App/Models/Brand', 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App/Models/Category', 'category_id', 'id');
    }

    public function sizes()
    {
        return $this->belongsToMany('App/Models/Size', 'size_product', 'product_id', 'size_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App/Models/Tag', 'tag_product', 'product_id', 'tag_id');
    }

    public function order_details()
    {
        return $this->belongsToMany('App\Models\Orders', 'order_details', 'order_id', 'product_id');
    }
}
