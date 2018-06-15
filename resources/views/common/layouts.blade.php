<!DOCTYPE html>
<html>
<head>
    <meta charset="uef-8">
    <title>轻松学习Laravel - @yield('title')</title>


    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/common.css') }}">
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    @section('style')
    @show
</head>
<script>
    $(function(){
        $('.li').click(function(){
            $('.li').each(function(){
                $(this).removeClass('hover');
            })
            if($(this).hasClass('hover')){
                $(this).removeClass('hover');
            }else{
                $(this).addClass('hover');
            }
        })
    })
</script>
<body>
@section('header')
    <div class="head">
        <div class="title">
            轻松学会Laravel<br/>
            <span class="min-title">--玩转Laravel表单</span>
        </div>
    </div>
@show
<div class="main">
    <div class="menu">
        {{--@section('leftmenu')--}}
            {{--<ul>--}}
                {{--<li class="li first hover">--}}
                    {{--<a href="{{ asset('student/index') }}">学生列表</a></li>--}}
                {{--<li class="li">--}}
                    {{--<a href="{{ asset('student/add') }}">新增学生</a></li>--}}
            {{--</ul>--}}
        {{--@show--}}
        @yield('leftmenu')
    </div>
    <div class="content">
        @yield('content')
    </div>
</div>
<div class="clear"></div>
@section('footer')
    <div class="footer">
        @Author---BY Codekiller
    </div>
@show

@section('javascript')
@show
</body>
</html>