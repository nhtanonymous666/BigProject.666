<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'tb_role_user';
    protected $primaryKey = 'ru_id';
    public $timestamps = false;

    public function User()
    {
        return $this->hasMany('App\User', 'ru_id', 'ru_id');
    }
}
