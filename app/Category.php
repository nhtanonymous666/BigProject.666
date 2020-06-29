<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tb_categories';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;

    public function SubCategory()
    {
    	return $this->hasMany('App\SubCategory', 'cate_id', 'cate_id');
    }

    public function Product()
    {
    	return $this->hasManyThrough('App\Product', 'App\SubCategory', 'cate_id', 'subcate_id', 'cate_id', 'subcate_id');
    }

    public function getCategory($cid)
    {
        return $this->findOrFail($cid);
    }

    public function getLeftBarCategory()
    {
        return $this->all();
    }
}
