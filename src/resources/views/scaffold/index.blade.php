@extends('zzld-foundation::scaffold.layout')

@section('content')
    <!-- Demo Content: Center Column Text -->
    <div class="p111h10">
        <div class="panel" id="spy3">
                    <div class="panel-heading" style="height:60px;padding:10px;">
                        <div class="btn-group pull-right">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">操作
                            <span class="caret ml5"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <li>
                                <a href="{{route('scaffold_create', ['model_name'=>$model->model_name])}}">
                                    <span class="octicon octicon-plus"></span> &nbsp;&nbsp;添加</a>
                              </li>
                            <li>
                              <a href="javascript:;">
                                  <span class="glyphicons glyphicons-search"></span> &nbsp;&nbsp;查看选中</a>
                            </li>
                            <li>
                              <a href="javascript:;">
                                  <span class="glyphicons glyphicons-pencil"></span> &nbsp;&nbsp;修改选中</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                              <a href="javascript:;" id="btn-remove-all" url="{{route('scaffold_destory_all', ['model_name'=>$model->model_name, 'format'=>'json'])}}">
                                  <span class="glyphicons glyphicons-remove_2"></span> &nbsp;&nbsp;删除选中</a>
                            </li>
                          </ul>
                        </div>
                        <!-- <a class="btn btn-primary pull-right" href="{{route('scaffold_create', ['model_name'=>$model->model_name])}}">
                            <span class="octicon octicon-plus"></span>&nbsp;&nbsp;添加
                        </a> -->
                    </div>
                    <div class="panel-body pn">
                      <div class="bs-component">
                          {!! TPL::grid($page, $model, $params) !!}
                      </div>
                    </div>
                    <div class="panel-footer text-right">
                      {!! $page->appends(['ps' => $ps])->links() !!}
                    </div>
    </div>
@stop
