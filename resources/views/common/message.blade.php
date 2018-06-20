@if (Session::get('success'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>成功！</strong> {{ Session::get('success') }}
</div>
@endif

@if (Session::get('error'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>失败!</strong> {{ Session::get('error') }}
</div>
@endif

@if (Session::get('loginerror'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>登录失败!</strong> {{ Session::get('loginerror') }}
    </div>
@endif

@if (Session::get('loginsuccess'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>登录成功!</strong> {{ Session::get('loginsuccess') }}
    </div>
@endif