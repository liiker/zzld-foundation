@extends('zzld-foundation::scaffold.layout')

@section('script')
<script>
function zzld_open(url){
	layer.open({
	  type: 2,
	  title: '添加',
	  shadeClose: false,
	  shade: true,
	  maxmin: true, //开启最大化最小化按钮
	  area: ['893px', '600px'],
	  content: url,
	  end: function(){
		  window.location.reload();
	  }
	});
}

$(function(){
	$('.zzld-create-inline').click(function(){
		var url = $(this).attr('url');
		zzld_open(url);
	});

	$('.zzld-destory').click(function(){
		var self = $(this);
		layer.confirm('确定要删除这条数据?', {
		  btn: ['确定','取消'] //按钮
		}, function(){
			var url = self.attr('url');
			$.get(url, {}, function(data){
				if(data.code == 0){
				  layer.msg('删除成功', {icon: 1});
				  self.parent().parent().parent().parent().parent().remove();
				}else{
				  layer.msg('删除失败', {icon: 2});
				}
			}, 'json');
		}, function(){
		});
	});
});
</script>
@stop

@section('content')
@if(method_exists($model, 'rela_model') and  $model->rela_model())
<div class="panel">
  <div class="panel-heading">
    <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
	@foreach($model->rela_model() as $key => $rela)
	@if($loop->first)
      <li class="active">
	@else
      <li>
	@endif
        <a href="#zzld_tab_{{ $key }}" data-toggle="tab">{{ $rela['name'] }}</a>
      </li>
	@endforeach
    </ul>
  </div>
  <div class="panel-body">
    <div class="tab-content pn br-n">
	@foreach($modelIns->rela_model() as $key => $rela)
		@if($loop->first)
		  <div id="zzld_tab_{{ $key }}" class="tab-pane active">
		@else
		  <div id="zzld_tab_{{ $key }}" class="tab-pane">
		@endif
        <div class="row">
		{!! TPL::grid( $modelIns->{$rela['rela']}, TPL::get_model($rela['model']), null, 'html', 'snippet.grid-inline' ) !!}
        </div>
    <div class="panel-footing">
        <a href="javascript:;" url="{{route('scaffold_inline_create', ['model_name'=>$model->model_name, 'id'=>$modelIns->id, 'rela_model'=>$rela['model'], 'rela'=>$rela['rela'] ])}}" class="btn btn-primary pull-right zzld-create-inline" style="margin:5px;">添加</a>
    </div>
      </div>
	@endforeach
    </div>
  </div>
</div>
@endif

<div class="panel">
  <div class="panel-heading">
    <span class="panel-title">{{$model->model_label}}详情</span>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" role="form">
         @foreach($model->admin_field() as $key => $field)
      <div class="form-group" style="border-bottom:1px dashed #ccc;">
        <label class="col-lg-3 control-label"><b>{{ $field['label']}}:</b></label>
        <div class="col-lg-8">
          <div class="bs-component">
            <p class="form-control-static text-dark">
                @if(isset($field['widget']) and $field['widget']['name']=='selector')
                {{ $field['widget']['options'][$modelIns[$key]] }}
				@elseif(isset($field['model']))
				{{ TPL::model_obj($field['model']['name'], $modelIns[$key]) }}
				@elseif(isset($field['field_wrapper']))
				{{ $field['field_wrapper']( $modelIns[$key] ) }}
                @else
                {{ $modelIns[$key] or '&nbsp;' }}
                @endif
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </form>
    <div class="panel-footing">
        <a href="{{route('scaffold_edit', ['model_name'=>$model->model_name, 'id'=>$modelIns->id])}}" class="btn btn-primary pull-right">修改</a>
        <a href="javascript:history.go(-1);" style="margin-right:10px;" type="button" class="btn btn-warning pull-right">返回</a>
    </div>
  </div>
</div>

@stop
