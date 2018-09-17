@extends('common.admin.layouts')
<body class="login-bg">
<div class="login layui-anim layui-anim-up">
    <div class="clear">
        @include('common.message')

    </div>

    <div class="message">{{ env('HOST_TITLE') }}</div>
    <div id="darkbannerwrap"></div>

    <form method="post" action="{{ url('site/dealLogin') }}" class="layui-form" >
        {{ csrf_field() }}
        <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>

<script>
    (function  () {
        layui.use('form', function(){
            var form = layui.form;
            form.on('submit(login)', function(data){
                // alert(888)
                layer.msg(JSON.stringify(data.field),function(){
                    location.href='index.html'
                });
                return false;
            });
        });
    })


</script>


<!-- 底部结束 -->
<script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>