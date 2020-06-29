<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $table = 'tb_cart_products';
    protected $primaryKey = 'cp_id';
    public $timestamps = false;

    public function Product()
    {
    	return $this->belongsTo('App\Product', 'prod_id', 'prod_id');
    }

    public function Cart()
    {
    	return $this->belongsTo('App\Cart', 'cart_id', 'cart_id');
    }
}
