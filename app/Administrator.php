<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'tb_administrators';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    public function AdminLoginHistory()
    {
    	return $this->hasMany('App\AdminLoginHistory', 'admin_id', 'admin_id');
    }

    public function RoleAdmin()
    {
    	return $this->belongsTo('App\RoleAdmin', 'ra_id', 'ra_id');
    }

    public function News()
    {
    	return $this->hasMany('App\News', 'admin_id', 'admin_id');
    }
}
