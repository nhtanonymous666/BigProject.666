<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\SubCategory;

class Product extends Model
{
    protected $table = 'tb_products';
    protected $primaryKey = 'prod_id';
    public $timestamps = false;

    public function SubCategory()
    {
    	return $this->belongsTo('App\SubCategory', 'subcate_id', 'subcate_id');
    }

    public function CalculationUnit()
    {
        return $this->belongsTo('App\CalculationUnit', 'cu_id', 'cu_id');
    }

    public function ProductImage()
    {
        return $this->hasMany('App\ProductImage', 'prod_id', 'prod_id');
    }

    public function Brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id', 'brand_id');
    }

    public function BillProduct()
    {
    	return $this->hasMany('App\BillProduct', 'prod_id', 'prod_id');
    }

    public function CartProduct()
    {
    	return $this->hasMany('App\CartProduct', 'prod_id', 'prod_id');
    }

    public function FavoriteProduct()
    {
    	return $this->hasMany('App\FavoriteProduct', 'prod_id', 'prod_id');
    }

    public function ProductReview()
    {
        return $this->hasMany('App\ProductReview', 'prod_id', 'prod_id');
    }

    public function getListProductHome()
    {
        return $this->orderBy('prod_date_created', 'desc')->paginate(8);
    }

    public function getListProductCategory($cid)
    {
        $temp = $this->join('tb_subcategories', 'tb_subcategories.subcate_id', '=', 'tb_products.subcate_id')
                     ->join('tb_categories', 'tb_categories.cate_id', '=', 'tb_subcategories.cate_id')
                     ->where('tb_categories.cate_id', '=', $cid)
                     ->select('tb_products.prod_name', 'tb_products.prod_id', 'tb_products.prod_price', 'tb_products.prod_sale_price', 'tb_products.subcate_id', 'tb_categories.cate_name', 'tb_subcategories.subcate_name', 'tb_products.prod_image', 'tb_products.prod_url')
                     ->orderBy('prod_date_created', 'desc')
                     ->paginate(9);
        return $temp;
    }

    public function getListProductSubCategory($cid, $sid)
    {
        $temp = $this->join('tb_subcategories', 'tb_subcategories.subcate_id', '=', 'tb_products.subcate_id')
                     ->join('tb_categories', 'tb_categories.cate_id', '=', 'tb_subcategories.cate_id')
                     ->where('tb_categories.cate_id', '=', $cid)
                     ->where('tb_subcategories.subcate_id', '=', $sid)
                     ->select('tb_products.prod_name', 'tb_products.prod_id', 'tb_products.prod_price', 'tb_products.prod_sale_price', 'tb_subcategories.subcate_id', 'tb_categories.cate_id', 'tb_categories.cate_name', 'tb_subcategories.subcate_name', 'tb_products.prod_image', 'tb_products.prod_url')
                     ->orderBy('prod_date_created', 'desc')
                     ->paginate(9);
        return $temp;
    }

    public function getProductDetail($pid)
    {
        return $this->with('SubCategory.Category')->findOrFail($pid);
    }
}
