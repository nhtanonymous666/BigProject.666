<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
	protected $table = 'tb_product_reviews';
    protected $primaryKey = 'pr_id';
    public $timestamps = false;

    public function Product()
    {
    	return $this->belongsTo('App\Product', 'prod_id', 'prod_id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}