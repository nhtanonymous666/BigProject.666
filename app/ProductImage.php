<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'tb_product_images';
    protected $primaryKey = 'pi_id';
    public $timestamps = false;

     public function Product()
    {
        return $this->belongsTo('App\Product', 'prod_id', 'prod_id');
    }
}
