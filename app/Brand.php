<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tb_brands';
    protected $primaryKey = 'brand_id';
    public $timestamps = false;

    public function Product()
    {
    	return $this->hasMany('App\Product', 'brand_id', 'brand_id');
    }
}
