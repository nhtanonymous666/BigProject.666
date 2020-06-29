<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'tb_favorites';
    protected $primaryKey = 'favo_id';
    public $timestamps = false;
    
    public function FavoriteProduct()
    {
    	return $this->hasMany('App\FavoriteProduct', 'favo_id', 'favo_id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
