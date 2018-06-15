@extends('common.layouts')

@section("leftmenu")
    <ul>
        <a href="{{ asset('student/index') }}">
            <li class="li first hover">学生列表</li>
        </a>
        <a href="{{ asset('student/add') }}">
            <li class="li">新增学生</li>
        </a>
    </ul>
@stop

@section('content')
    @include('common.message')
    <div id="table">
        <table class="table table-striped">
            <thead>
            <tr class="active">
                <td colspan="6">学生列表</td>
            </tr>
            </thead>
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id  }}</td>
                    <td>{{ $student->name  }}</td>
                    <td>{{ $student->age  }}</td>
                    <td>{{ $student->sex($student->sex)  }}</td>
                    <td>{{ date("Y-m-d H:i:s",$student->action_date) }}</td>
                    <td>
                        <a href="">详情</a>
                        <a href="{{ url('student/update',['id' => $student->id]) }}">修改</a>
                        <a onclick="if (confirm('您确定要删除吗？') == false) return false;"
                           href="{{ url('student/delete',['id' => $student->id]) }}">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <div class="pull-right">
            {{ $students->render() }}
        </div>
    </div>

@stop