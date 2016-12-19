<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function listing(Request $request)
    {
        $goods = Goods::paginate(10);
        // dump($goods);
        foreach ($goods as $good) {
            $good->cover = $good->pictures()->where('is_cover', 1)->value('link');
        }

        return view('goods.listing', ['goods' => $goods]);
    }

    public function detail(Request $request, $id)
    {
        $detail = Goods::find($id);
        $detail->pictures = $detail->pictures()->lists('link');
        // dump($detail->toArray());
        return view('goods.detail', ['detail' => $detail]);
    }
}
