<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
    protected $fillable = ['goods_id', 'goods_name', 'goods_num', 'goods_price'];
}
