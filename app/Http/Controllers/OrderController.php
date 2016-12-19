<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Goods;
use App\Models\Order;
use App\Models\OrderGoods;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request) 
    {
        // 创建订单
        $order = Order::create([
                'user_id' => $request->user()->user_id,
            ]);

        
        $goods = Goods::find($request->goods_id)->toArray();
        // 以数据库优先，防止恶意输入数据
        $goods = array_merge($request->all(), $goods);
        $goods['order_id'] = $order->order_id;

        // 纪录订单商品
        $order_goods = OrderGoods::create($goods);

        return response()->json(['order_id' => $order->order_id]);
        
    }

    public function confirm(Request $request)
    {
        // 验证订单是否存在
        return view('order.confirm');
    }
}
