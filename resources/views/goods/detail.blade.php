<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div>name</div><div>{{$detail->name}}</div>
    <div>price</div>
    <div>{{$detail->price}}</div>
    <div>轮播图</div>
    @foreach ($detail->pictures as $link)
    <img src="{{$link}}">
    @endforeach
    <div>description</div>
    <div>{{$detail->description}}</div>

    <form method="post" action="{{route('order_confirm')}}">
        {{csrf_field()}}
        <div>数量</div>
        <div><input name="number" value="{{old('number')}}"></div>
        <input type="submit" value="提交">
    </form>
</body>
</html>