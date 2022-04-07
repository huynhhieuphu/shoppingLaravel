<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public $timestamp = false;

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','size_product', 'tag_id', 'product_id');
    }
}
