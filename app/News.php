<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'tb_news';
    protected $primaryKey = 'news_id';
    public $timestamps = false;

    public function Administrator()
    {
    	return $this->belongsTo('App\Administrator', 'admin_id', 'admin_id');
    }
}
