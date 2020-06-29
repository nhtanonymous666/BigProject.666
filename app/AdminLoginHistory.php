<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLoginHistory extends Model
{
    protected $table = 'tb_administrators';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    public function Administrator()
    {
    	return $this->belongsTo('App\Administrator', 'admin_id', 'admin_id');
    }
}
