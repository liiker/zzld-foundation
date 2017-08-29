@extends('zzld-foundation::scaffold.layout-inline')

@section('content')
<div class="panel">
  <div class="panel-heading">
    <span class="panel-title">{{$model->model_label}}详情</span>
  </div>
  <div class="panel-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            请修改错误后重新提交
        </div>
    @endif

    <form id="zzld-inline-form" action="{{route('scaffold_inline_store', ['model_name'=>$model_name, 'id'=>$id, 'rela_model'=>$rela_model, 'rela'=>$rela])}}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
	{!! TPL::form( $modelIns, $model, false, 'html', 'snippet.form-inline' ) !!}
      <div class="col-lg-9">
          <input type="submit" class="btn btn-primary pull-right" value="提交">
          <a href="javascript:history.go(-1);" style="margin-right:10px;" type="button" class="btn btn-warning pull-right">返回</a>
      </div>
    </form>

  </div>
</div>
@stop

@section('script')
<script>
$(function(){
	$('#zzld-inline-form').submit(function(){
		$(this).find(':input').removeAttr('disabled');
		return true;
	});
});
</script>
@stop
