<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public function pictures()
    {
        return $this->hasMany('App\Models\GoodsPicture', 'goods_id', 'id');
    }    
}
