<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany('App/Models/Order', 'customer_id', 'id');
    }
}
