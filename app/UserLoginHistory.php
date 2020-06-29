<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLoginHistory extends Model
{
    protected $table = 'tb_user_login_history';
    protected $primaryKey = 'ulh_id';
    public $timestamps = false;

    public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
