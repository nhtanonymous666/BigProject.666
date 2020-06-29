<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    protected $table = 'tb_bill_products';
    protected $primaryKey = 'bp_id';
    public $timestamps = false;

    public function Product()
    {
    	return $this->belongsTo('App\Product', 'prod_id', 'prod_id');
    }

    public function Bill()
    {
    	return $this->belongsTo('App\Bill', 'bill_id', 'bill_id');
    }
}
