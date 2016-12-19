<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <table>
        <tr>
            <td>id</td>
            <td>名称</td>
            <td>价格</td>
            <td>图片</td>
        </tr>

    @foreach ($goods as $good)
    <tr>
        <td>{{$good->goods_id}}</td>
        <td>{{$good->goods_name}}</td>
        <td>{{$good->goods_price}}</td>
        <td><a href="{{route('goods_detail', ['id' => $good->goods_id])}}"><img src="{{$good->cover}}"></a></td>
    </tr>
        
    @endforeach
    </table>
</div>
{!! $goods->render() !!}
</body>
</html>