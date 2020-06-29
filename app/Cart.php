<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cart extends Model
{
    protected $table = 'tb_carts';
    protected $primaryKey = 'cart_id';
    public $timestamps = false;
    
    public function CartProduct()
    {
    	return $this->hasMany('App\CartProduct', 'cart_id', 'cart_id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    public function listCart($user_id)
    {
        $list = $this->join('tb_cart_products', 'tb_cart_products.cart_id', 'tb_carts.cart_id')
                     ->join('tb_products', 'tb_products.prod_id', 'tb_cart_products.prod_id')
                     ->where('tb_carts.user_id', $user_id)
                     ->select('tb_products.prod_name', 'tb_products.prod_image', 'tb_products.prod_id', 'tb_products.prod_price', 'tb_products.prod_sale_price', 'tb_cart_products.cp_quantity', 'tb_cart_products.cp_price')
                     ->orderBy('cp_date_updated', 'desc');
        return $list;
    }

    public function numListCart($user_id)
    {
        $num = $this->join('tb_cart_products', 'tb_cart_products.cart_id', 'tb_carts.cart_id')
                     ->where('tb_carts.user_id', $user_id)
                     ->sum('tb_cart_products.cp_quantity');
        return $num;
    }

    public function totalPrice($user_id)
    {
        $price = $this->join('tb_cart_products', 'tb_cart_products.cart_id', 'tb_carts.cart_id')
                     ->where('tb_carts.user_id', $user_id)
                     ->sum('tb_cart_products.cp_price');
        return $price;
    }

    public function subTotalPrice($user_id)
    {
        $subprice = $this->join('tb_cart_products', 'tb_cart_products.cart_id', '=', 'tb_carts.cart_id')
                     ->join('tb_products', 'tb_products.prod_id', '=', 'tb_cart_products.prod_id')
                     ->where('tb_carts.user_id', '=', $user_id)
                     ->sum(DB::raw('tb_products.prod_price * tb_cart_products.cp_quantity'));
        return $subprice;
    }

    public function discountPrice($user_id)
    {
        $sale = $this->join('tb_cart_products', 'tb_cart_products.cart_id', '=', 'tb_carts.cart_id')
                     ->join('tb_products', 'tb_products.prod_id', '=', 'tb_cart_products.prod_id')
                     ->where('tb_carts.user_id', '=', $user_id)
                     ->sum(DB::raw('tb_products.prod_sale_price * tb_cart_products.cp_quantity'));
        $discount = $this->subTotalPrice($user_id) - $sale;
        return $discount;
    }
}
