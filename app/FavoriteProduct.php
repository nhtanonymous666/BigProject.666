<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    protected $table = 'tb_favorite_products';
    protected $primaryKey = 'fp_id';
    public $timestamps = false;

    public function Product()
    {
    	return $this->belongsTo('App\Product', 'prod_id', 'prod_id');
    }

    public function Favorite()
    {
    	return $this->belongsTo('App\Favorite', 'favo_id', 'favo_id');
    }
}
