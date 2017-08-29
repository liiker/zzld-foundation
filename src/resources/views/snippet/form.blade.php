
	<script src="/static/ueditor/ueditor.config.js"></script>
	<script src="/static/ueditor/ueditor.all.min.js"></script>
      @if($modelIns)
      <input type="hidden" name="id" value="{{ $modelIns->id }}"/>
      @endif
      {!! csrf_field() !!}
      @foreach($model->admin_field() as $key => $field)
	<?php
		if(isset($field['virtual'])) { continue; }
		$readonly = "";
		if(isset($field['editable']) && $field['editable'] == false){
			$readonly = ' readonly="readonly" ';
		}
	?>
      <div class="form-group" >
        <label class="col-lg-3 control-label">{{ $field['label']}}:</label>
        <div class="col-lg-6">
          <div class="bs-component">
                @if(isset($field['widget']) and $field['widget']['name']=='selector')
                  {!! TPL::select($key, $field['widget']['options'], $modelIns?$modelIns->$key:null, ['class'=>'form-control']) !!}
                @elseif(isset($field['widget']) and $field['widget']['name']=='upload')
                    {!! TPL::file($key, "", ['class'=>'form-control']) !!}
                    @if($modelIns)
                    <a target="_blank" href="{{$modelIns[$key]}}">{{$modelIns[$key]}}</a>
                    @endif
                @elseif(isset($field['widget']) and $field['widget']['name']=='datetimepicker')
                    {!! TPL::datetime($key, $modelIns?$modelIns->$key:'', [], $field['widget']['type']) !!}
				@elseif(isset($field['widget']) and $field['widget']['name']=='textarea')
					<textarea name="{{ $key }}" id="id-{{ $key }}" class="form-control" rows="{{ isset($field['widget']['rows']) ? $field['widget']['rows'] : 3 }}" {{ $readonly }}>{{ $modelIns[$key] or '' }}</textarea>
				@elseif(isset($field['widget']) and $field['widget']['name']=='richeditor')
					<script id="id-{{ $key }}" name="{{ $key }}" type="text/plain">
						{!!   $modelIns[$key] or '' !!}
					</script>
					<script>
					var ue_{{$key}} = UE.getEditor('id-{{ $key }}');
					</script>
        @elseif(isset($field['model']))
          {!! TPL::modelSelect($key, $modelIns[$key], $field['model']['name'], isset($field['model']['show']) ? $field['model']['show']:$field['model']['key']) !!}
          {{--
                <select class="form-control" name="{{ $key }}" {{ $readonly }}>
                    @if(isset($field['model']['nullable']) && $field['model']['nullable']==true)
                      <option value="{{ isset($field['model']['default']) ? $field['model']['default'] : 0 }}"> ==请选择== </option>
                    @endif
                    @if(isset($field['model']['list']))
                        @foreach($field['model']['list']() as $option)
                        <option @if($modelIns and $modelIns[$key]==$option[$field['model']['key']]) selected="selected"  @endif value="{{$option[$field['model']['key']]}}">{{$option}}</option>
                        @endforeach
                    @else
                        @foreach(TPL::model_list($field['model']['name'], 500) as $option)
                        <option @if($modelIns and $modelIns[$key]==$option[$field['model']['key']]) selected="selected"  @endif value="{{$option[$field['model']['key']]}}">{{$option}}</option>
                        @endforeach
                    @endif
                </select>
          --}}
                @else
                <input class="form-control" type="text" value="{{ $modelIns[$key] or '' }}" name="{{$key}}" id="id-{{$key}}"  {{ $readonly }}/>
                @endif
          </div>
        </div>
        <div class="col-lg-3 form-control-static">
            @if($errors->has($key))
                <div class="text-danger">
                    @foreach($errors->get($key) as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @else
                @if(isset($field['tip']))
                {!! $field['tip'] !!}
                @endif
            @endif
        </div>
      </div>
      @endforeach
