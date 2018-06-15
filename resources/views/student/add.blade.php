@extends('common.layouts')

@section("leftmenu")
	<ul>
		<a href="{{ url('student/index') }}">
			<li class="li first">学生列表</li>
		</a>
		<a href="{{ url('student/add') }}">
			<li class="li hover">新增学生</li>
		</a>
	</ul>
@stop

@section('content')
	{{--@include('common.message')--}}
	<table class="table table-striped">
		<thead><tr class="active"><td colspan="5">添加学生</td></tr></thead>
		<thead>
		<tr>
			<td>
				<form class="form-horizontal" role="form" action="{{ url('student/addHandle') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputEmail3"  name="Student[name]" placeholder="请输入学生姓名">
						</div>
						<div class="col-sm-5">
							<p class="form-control-static text-danger">姓名不能为空</p>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">年龄</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="Student[age]" id="inputPassword3" placeholder="请输入年龄">
						</div>
						<div class="col-sm-5">
							<p class="form-control-static text-danger">年龄只能为整数</p>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">性别</label>
						<div class="col-sm-5">
							<label class="radio-inline">
							  	<input type="radio" name="Student[sex]" checked="checked" id="inlineRadio1" value="1"> 男
							</label>
							<label class="radio-inline">
							  	<input type="radio" name="Student[sex]" id="inlineRadio2" value="2"> 女
							</label>
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