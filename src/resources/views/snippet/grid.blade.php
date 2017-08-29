<table class="table table-bordered mbn grid">
  <thead>
    <tr>
      <th style="width:40px;">
          <input type="checkbox" id="check-all"/>
      </th>
      @foreach($model->display_list() as $field)
      <th>{{ $model->admin_field()[$field ]['label'] }}</th>
      @endforeach
      <th style="width:100px;">操作</th>
    </tr>
    <form id="zzld-search-form" action="">
        <tr>
          <th style="width:40px;"></th>
          @foreach($model->display_list() as $field)
          @if(in_array($field, $model->search_list()))
          <td><input name="{{$field}}" @if(isset($params[$field])) value="{{$params[$field]}}" @endif type=""/></td>
          @else
          <td></td>
          @endif
          @endforeach
          <td style="width:100px;">
            <a class="btn btn-success" onclick="javascript:document.getElementById('zzld-search-form').submit()">
                <span class="glyphicons glyphicons-search"></span>&nbsp;搜索
            </a>
          </td>
        </tr>
    </form>
  </thead>
  <tbody>
  @foreach($page as $row)
    @if($model->enable_row_wrapper($row))
    {!! $model->row_wrapper($row) !!}
    @else
    <tr
    @if(method_exists($model, 'row_style'))
     style="{{ $model->row_style($row) }}"
    @endif
    @if(method_exists($model, 'row_class'))
     class="{{ $model->row_class($row) }}"
    @endif
    >
      <td><input type="checkbox" value="{{$row->id}}" name="ids"/></td>
      @foreach($model->display_list() as $field)
      <td>
          @if(isset($model->admin_field()[$field]['field_wrapper']))
          {!! $model->admin_field()[$field]['field_wrapper']($row[$field]) !!}
		  @elseif(isset($model->admin_field()[$field]['model']))
		  <a href="{{ route('scaffold_show', ['model_name'=>$model->admin_field()[$field]['model']['name'], $row[$field], 'format'=>$format]) }}">
			{{ TPL::model_obj( $model->admin_field()[$field]['model']['name'], $row[$field] ) }}
		</a>
         @elseif(isset($model->admin_field()[$field]['widget']))
            @if($model->admin_field()[$field]['widget']['name']=='selector')
                {{ $model->admin_field()[$field]['widget']['options'][$row[$field]] }}
            @else
            {{$row[$field]}}
            @endif
		  @else
          {{$row[$field]}}
          @endif
      </td>
      @endforeach
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">操作
            <span class="caret ml5"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{route('scaffold_show', ['model_name'=>$model->model_name, 'id'=>$row->id, 'format'=>$format])}}"><span class="glyphicons glyphicons-search"></span> &nbsp;&nbsp;查看</a>
            </li>
            <li>
              <a href="{{route('scaffold_edit', ['model_name'=>$model->model_name, 'id'=>$row->id, 'format'=>$format])}}"><span class="glyphicons glyphicons-pencil"></span> &nbsp;&nbsp;修改</a>
            </li>
            <li class="divider"></li>
            <li>
              <a class="zzld-row-destory" href="javascript:;" url="{{route('scaffold_destory', ['model_name'=>$model->model_name, 'id'=>$row->id, 'format'=>$format])}}"><span class="glyphicons glyphicons-remove_2"></span> &nbsp;&nbsp;删除</a>
            </li>
          </ul>
        </div>
      </td>
    </tr>
    @endif
  @endforeach
  </tbody>
</table>
