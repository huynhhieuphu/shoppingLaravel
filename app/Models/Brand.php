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

        return $brand;
    }

    public function deleteBrand($id = 0)
    {
        $brand = Brand::find($id);
        // return $brand->delete();
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        return $brand->save();
    }

    public function changeStatus($id = 0, $status = -1)
    {
        $result = false;
        if($id > 0 && $status > -1) {
            $result = Brand::where('id', $id)
                        ->update([
                            'status' => $status, 
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
        }

        return $result;
    }
}
