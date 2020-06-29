<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'tb_slide';
    protected $primaryKey = 'slide_id';
    public $timestamps = false;
}
