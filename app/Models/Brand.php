<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    protected $table = 'brands';
    
    protected $fillable = ['name', 'slug', 'image', 'descriptions', 'status', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App/Models/products', 'brand_id', 'id');
    }

    public function addBrand($name = null, $descriptions = null, $image = null, $status = 0)
    {
        $brand = Brand::create([
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'descriptions' => $descriptions,
            'image' => $image,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if($brand) {
            return true;
        }
        return false;
    }

    public function deleteBrand($id = 0)
    {
        $brand = Brand::find($id);
        // return $brand->delete();
        $brand->status = 0;
        return $brand->save();
    }
}
