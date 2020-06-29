<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'tb_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $rememberTokenName = 'user_remember_token';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_first_name', 'user_last_name', 'user_user_name', 'user_email', 'user_password', 'user_phone', 'user_nation', 'user_address', 'user_date_of_birth', 'ru_id'
    ];

    /**
     * [getAuthPassword description]
     * @return [type] [description]
     */
    public function getAuthPassword()
    {
        return $this->user_password;
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'user_remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_date_email_verified' => 'datetime',
    ];

    public function UserLoginHistory()
    {
        return $this->hasMany('App\UserLoginHistory', 'user_id', 'user_id');
    }

    public function RoleUser()
    {
        return $this->belongsTo('App\RoleUser', 'ru_id', 'ru_id');
    }

    public function Bill()
    {
    	return $this->hasMany('App\Bill', 'User_ID', 'User_ID');
    }

    public function Logs()
    {
    	return $this->hasMany('App\Logs', 'User_ID', 'User_ID');
    }

    public function Cart()
    {
    	return $this->hasOne('App\Cart', 'User_ID', 'User_ID');
    }

    public function Favorite()
    {
    	return $this->hasOne('App\Favorite', 'User_ID', 'User_ID');
    }
}
