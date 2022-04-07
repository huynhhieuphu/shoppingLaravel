<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamp = false;

    public function customer()
    {
        return $this->belongsTo('App/Models/Customer', 'customer_id', 'id');
    }

    public function order_details()
    {
        return $this->belongsToMany('App/Models/Product', 'order_details', 'order_id', 'product_id');
    }
}
