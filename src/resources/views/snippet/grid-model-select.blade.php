<table class="table table-bordered mbn grid">
  <thead>
    <tr>
      <th style="width:40px;">
         选择
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
      <td><input class="select-row" type="radio" sid="{{$row->id}}" value="{{$row->id}}" name="ids"/></td>
      @foreach($model->display_list() as $field)
      <td>
          @if(isset($model->admin_field()[$field]['field_wrapper']))
          {!! $model->admin_field()[$field]['field_wrapper']($row[$field]) !!}
		  @elseif(isset($model->admin_field()[$field]['model']))
		  <a href="{{ route('scaffold_show', ['model_name'=>$model->admin_field()[$field]['model']['name'], $row[$field], 'format'=>$format]) }}">
			{{ TPL::model_obj( $model->admin_field()[$field]['model']['name'], $row[$field] ) }}
		</a>
		  @else
          {{$row[$field]}}
          @endif
      </td>
      @endforeach
      <td>
          <button sid="{{$row->id}}" type="button" class="btn btn-primary select-row">选择</button>
      </td>
    </tr>
    @endif
  @endforeach
  </tbody>
</table>
