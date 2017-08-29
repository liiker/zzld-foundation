      @if($modelIns)
      <input type="hidden" name="id" value="{{ $modelIns->id }}"/>
      @endif
      {!! csrf_field() !!}
      @foreach($model->admin_field() as $key => $field)
		<?php 
			if(isset($field['virtual'])) { continue; } 
			$readonly = "";
			if(isset($field['editable']) && $field['editable'] == false){
				$readonly = ' disabled ';
			}
		?>
      <div class="form-group" >
        <label class="col-xs-3 control-label">{{ $field['label']}}:</label>
        <div class="col-xs-6">
          <div class="">
                @if(isset($field['widget']) and $field['widget']['name']=='selector')
                    <select class="form-control" name="{{$key}}" {{ $readonly }}>
                        @foreach($field['widget']['options'] as $opt_val=>$opt_txt)
                        <option @if($modelIns and $modelIns[$key]==$opt_val) selected="selected"  @endif value="{{$opt_val}}">{{$opt_txt}}</option>
                        @endforeach
                    </select>
                @elseif(isset($field['widget']) and $field['widget']['name']=='upload')
                    <input class="form-control" type="file" name="{{$key}}" id="id-{{$key}}" {{ $readonly }}/>
                    @if($modelIns)
                    <a target="_blank" href="{{$modelIns[$key]}}">{{$modelIns[$key]}}</a>
                    @endif
                @elseif(isset($field['widget']) and $field['widget']['name']=='datetimepicker')
                    @if($field['widget']['type']=='datetime')
                        <input class="form-control datetimepicker" value="{{ $modelIns[$key] or '' }}" type="text" name="{{$key}}" id="id-{{$key}}" {{ $readonly }}/>
                    @elseif($field['widget']['type']=='time')
                        <input class="form-control timepicker" value="{{ $modelIns[$key] or '' }}" type="text" name="{{$key}}" id="id-{{$key}}" {{ $readonly }}/>
                    @elseif($field['widget']['type']=='date')
                        <input class="form-control datepicker" value="{{ $modelIns[$key] or '' }}" type="text" name="{{$key}}" id="id-{{$key}}" {{ $readonly }}/>
                    @endif
                @elseif(isset($field['model']))
                <select class="form-control" name="{{ $key }}" {{ $readonly }}>
                    @if(isset($field['model']['list']))
                        @foreach($field['model']['list']() as $option)
                        <option @if($modelIns and $modelIns[$key][$field['model']['key']]==$option[$field['model']['key']]) selected="selected"  @endif value="{{$option[$field['model']['key']]}}">{{$option}}</option>
                        @endforeach
                    @else
                        @foreach(TPL::model_list($field['model']['name']) as $option)
                        <option @if($modelIns and $modelIns[$key][$field['model']['key']]==$option[$field['model']['key']]) selected="selected"  @endif value="{{$option[$field['model']['key']]}}">{{$option}}</option>
                        @endforeach
                    @endif
                </select>
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
