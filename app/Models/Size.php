<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    public $timestamp = false;

    public function products()
    {
        return $this->belongsToMany('App/Models/product', 'size_product', 'size_id', 'product_id');
    }
}
