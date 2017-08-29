@extends('zzld-foundation::scaffold.layout')

@section('content')
  @if(Session::has('flash-message'))
    <div class="alert alert-danger">{{ Session::get('flash-message') }}</div>
    @endif
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">修改密码</span>
    </div>
    <div class="panel-body">
      <form action="{{ route('foundation.changepassword.do') }}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $user->id }}" name="uid"/>
        <div class="form-group">
          <label class="col-lg-3 control-label">账号</label>
          <div class="col-lg-6">
            <div class="bs-component form-control-static">
              {{ $user->email }}
            </div>
          </div>
          <div class="col-lg-3 form-control-static">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">原始密码</label>
          <div class="col-lg-6">
            <div class="bs-component">
              <input class="form-control" type="password" value="" name="password" id="id-password">
            </div>
          </div>
          <div class="col-lg-3 form-control-static">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">新密码</label>
          <div class="col-lg-6">
            <div class="bs-component">
              <input class="form-control" type="password" value="" name="newpassword" id="id-newpassword">
            </div>
          </div>
          <div class="col-lg-3 form-control-static">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">确认密码</label>
          <div class="col-lg-6">
            <div class="bs-component">
              <input class="form-control" type="password" value="" name="passwordconfirm" id="id-passwordconfirm">
            </div>
          </div>
          <div class="col-lg-3 form-control-static">
          </div>
        </div>
        <div class="col-lg-9">
          <input type="submit" class="btn btn-primary pull-right" value="提交">
          <a href="javascript:history.go(-1);" style="margin-right:10px;" type="button" class="btn btn-warning pull-right">返回</a>
          </div>
      </form>
    </div>
    </div>
@stop
