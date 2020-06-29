<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'tb_bills';
    protected $primaryKey = 'bill_id';
    public $timestamps = false;
    
    public function BillProduct()
    {
    	return $this->hasMany('App\BillProduct', 'bill_id', 'bill_id');
    }
    
    public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    public function BillStatus()
    {
        return $this->belongsTo('App\BillStatus', 'bs_id', 'bs_id');
    }

    public function PaymentType()
    {
        return $this->belongsTo('App\PaymentType', 'pt_id', 'pt_id');
    }
}