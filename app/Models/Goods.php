<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $primaryKey = 'goods_id';

    public function pictures()
    {
        return $this->hasMany('App\Models\GoodsPicture', 'goods_id', 'goods_id');
    }    
}
