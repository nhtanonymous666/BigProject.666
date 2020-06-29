<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
    protected $table = 'tb_role_admin';
    protected $primaryKey = 'ra_id';
    public $timestamps = false;

    public function Administrator()
    {
    	return $this->hasMany('App\Administrator', 'ra_id', 'ra_id');
    }
}
