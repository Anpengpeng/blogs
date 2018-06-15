@extends('common.layouts')



@section('content')
    {{--@include('common.message')--}}
    <table class="table table-striped">
        <thead><tr class="active"><td colspan="5">文件上传</td></tr></thead>
        <thead>
        <tr>
            <td>
                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">请选择上传文件</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" id="inputEmail3"  name="source" placeholder="请选择文件">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        </thead>
    </table>
@stop