<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class SubCategory extends Model
{
    protected $table = 'tb_subcategories';
    protected $primaryKey = 'subcate_id';
    public $timestamps = false;

    public function Category()
    {
    	return $this->belongsTo('App\Category', 'cate_id', 'cate_id');
    }

    public function Product()
    {
    	return $this->hasMany('App\Product', 'subcate_id', 'subcate_id');
    }

    public function getSubCategory($sid)
    {
        return $this->with('Category')->findOrFail($sid);
    }
}
