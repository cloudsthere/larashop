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

    <form id="form_create">
        <input type="hidden" name="goods_id" value="{{$detail->goods_id}}">
        {{csrf_field()}}
        <div>数量</div>
        <div><input name="goods_num" value="1"></div>
        <button id="create">立即购买</button>
        <button id="cart">加入购物车</button>
    </form>
</body>
<script src="//cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#create').click(function(e){
        e.preventDefault()
        var form = new FormData($('#form_create')[0]);
        $.ajax({
            url : "{{route('order_create')}}",
            type : 'post',
            data : form,
            processData : false,
            contentType : false,
            success : function(res) {
                console.log(res)
                location.href = "{{route('order_confirm')}}?order_id=" + res.order_id
            },
            error : function(res) {
                // console.log(res.status)
                if (res.status == 401) {
                    location.href = "{{route('auth_login')}}"
                }
            }

        })
        
    $('#cart').click(function(e){
        e.preventDefault()
        var form = new FormData($('#form_create')[0]);
        $.ajax({
            url : "{{route('cart_add')}}",
            type : 'post',
            data : form,
            processData : false,
            contentType : false,
            success : function(res) {
                console.log(res)
                location.href = "{{route('order_confirm')}}?order_id=" + res.order_id
            },
            error : function(res) {
                // console.log(res.status)
                if (res.status == 401) {
                    location.href = "{{route('auth_login')}}"
                }
            }

        })
        // console.log(form)
    })
</script>
</html>