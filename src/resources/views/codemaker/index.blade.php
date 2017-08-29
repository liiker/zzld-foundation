@extends('zzld-foundation::scaffold.layout_tray')

@section('style')
<link rel="stylesheet" href="/static/codemirror/lib/codemirror.css">
@stop

@section('script')
<script src="/static/codemirror/lib/codemirror.js" charset="utf-8"></script>
<script src="http://codemirror.net/2/lib/util/formatting.js"></script>
<script src="/static/codemirror/addon/edit/matchbrackets.js"></script>
<script src="/static/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="/static/codemirror/mode/xml/xml.js"></script>
<script src="/static/codemirror/mode/javascript/javascript.js"></script>
<script src="/static/codemirror/mode/css/css.js"></script>
<script src="/static/codemirror/mode/clike/clike.js"></script>
<script src="/static/codemirror/mode/php/php.js" charset="utf-8"></script>
<script type="text/javascript">
var box_name = ['code-box-model', 'code-box-list', 'code-box-form', 'code-box-controller'];
for(var i=0; i<box_name.length; i++){
    var editor = CodeMirror.fromTextArea(document.getElementById(box_name[i]), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "php",
        indentUnit: 4,
        indentWithTabs: true
    });
    editor.setSize(800, 600);
    // CodeMirror.commands["selectAll"](editor);
}

function getSelectedRange() {
    return { from: editor.getCursor(true), to: editor.getCursor(false) };
}

function autoFormatSelection() {
    var range = getSelectedRange();
    editor.autoFormatRange(range.from, range.to);
}

$(function(){
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
		});
	$.post('/admin/testpost',{}, function(data){console.log(data)});
});
</script>
@stop

@section('tray')
<aside class="tray tray-left tray320" style="padding:0;height: 760px;">
    <div class="panel mobile-controls" id="p18" style="height:760px;">
			<div class="panel-heading ui-sortable-handle">
			  <span class="panel-title">数据库: {{ $database }}</span>
			</div>
			<div class="panel-body pn">
			  <table class="table mbn">
				<thead>
				  <tr class="hidden">
					<th>#</th>
					<th>First Name</th>
					<th></th>
				  </tr>
				</thead>
				<tbody>
				@foreach($tables as $t)
				  <tr>
					  <td>{{$loop->index+1}}</td>
					  <td>{{ $t->{"Tables_in_$database"} }}</td>
					  <td><a href="{{route('codemaker_model', ['table_name'=>$t->{"Tables_in_$database"}])}}" class="btn btn-primary btn-sm">生成</a></td>
				  </tr>
				@endforeach
				</tbody>
			  </table>
			</div>
		  </div>
</aside>
@stop
@section('content')
<div class="panel mb25 mt5">
            <div class="panel-heading">
              <span class="panel-title hidden-xs">生成代码</span>
              <ul class="nav panel-tabs-border panel-tabs">
                <li class="active">
                  <a href="#tab1_1" data-toggle="tab" aria-expanded="true">模型代码</a>
                </li>
                <li class="">
                  <a href="#tab1_2" data-toggle="tab" aria-expanded="false">列表代码</a>
                </li>
                <li class="">
                  <a href="#tab1_3" data-toggle="tab" aria-expanded="false">表单代码</a>
                </li>
                <li class="">
                  <a href="#tab1_4" data-toggle="tab" aria-expanded="false">控制器</a>
                </li>
              </ul>
            </div>
            <div class="panel-body p20 pb10">
              <div class="tab-content pn br-n admin-form">
                <div id="tab1_1" class="tab-pane active">
                    <button style="margin-right:50px;" class="btn btn-primary pull-right" name="button" onclick="autoFormatSelection()">格式化</button>
                    <textarea id="code-box-model" style="width:600px;">{{$code_model}}</textarea>
                </div>
                <div id="tab1_2" class="tab-pane">
                    <button style="margin-right:50px;" class="btn btn-primary pull-right" name="button" onclick="autoFormatSelection()">格式化</button>
                    <textarea id="code-box-list" style="width:600px;">{{$code_list}}</textarea>
                </div>
                <div id="tab1_3" class="tab-pane">
                    <button style="margin-right:50px;" class="btn btn-primary pull-right" name="button" onclick="autoFormatSelection()">格式化</button>
                    <textarea id="code-box-form" style="width:600px;">{{$code_form}}</textarea>
                </div>
                <div id="tab1_4" class="tab-pane">
                    <button style="margin-right:50px;" class="btn btn-primary pull-right" name="button" onclick="autoFormatSelection()">格式化</button>
                    <textarea id="code-box-controller" style="width:600px;">{{$code_controller}}</textarea>
                </div>
              </div>
            </div>
          </div>

@stop
