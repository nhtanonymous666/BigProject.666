<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'tb_payment_types';
    protected $primaryKey = 'pt_id';
    public $timestamps = false;

    ublic function Bill()
    {
    	return $this->hasMany('App\Bill', 'pt_id', 'pt_id');
    }
}
