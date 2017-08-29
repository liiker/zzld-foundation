@extends('zzld-foundation::scaffold.layout-inline')

@section('script')
  <script>
   $(function(){
       $('.select-row').on('click', function(){
           var selectId = $(this).attr('sid');
           parent.modelSelected(selectId);

           layer.msg('加载数据中');
       });
   });
  </script>
@stop


@section('content')
    <!-- Demo Content: Center Column Text -->
    <div class="p111h10">
        <div class="panel" id="spy3">
                    <div class="panel-body pn">
                      <div class="bs-component">
                          {!! TPL::grid($page, $model, $params, 'html', 'snippet.grid-model-select') !!}
                      </div>
                    </div>
                    <div class="panel-footer text-right">
                      {!! $page->appends(['ps' => $ps])->links() !!}
                    </div>
    </div>
@stop
