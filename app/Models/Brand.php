<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    
    public $timestamp = false;

    public function products()
    {
        return $this->hasMany('App/Models/products', 'brand_id', 'id');
    }
}
