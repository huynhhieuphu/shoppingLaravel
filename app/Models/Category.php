<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamp = false;

    public function products()
    {
        return $this->hasMany('App/Models/Product', 'category_id', 'id');
    }
}
