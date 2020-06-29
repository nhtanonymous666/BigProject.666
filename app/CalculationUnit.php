<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalculationUnit extends Model
{
    protected $table = 'tb_calculation_unit';
    protected $primaryKey = 'cu_id';
    public $timestamps = false;

    public function Product()
    {
        return $this->hasMany('App\Product', 'cu_id', 'cu_id');
    }
}
