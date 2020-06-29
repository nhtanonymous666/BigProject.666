<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillStatus extends Model
{
    protected $table = 'tb_bill_statuses';
    protected $primaryKey = 'bs_id';
    public $timestamps = false;

    public function Bill()
    {
    	return $this->hasMany('App\Bill', 'bs_id', 'bs_id');
    }
}
