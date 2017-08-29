<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zzld\Foundation\Support\Adminable;

class {{class_name}} extends Model
{
    use Adminable;

    protected $table = '{{table}}';
    protected $fillable = [{% for col in columns %}'{{col.COLUMN_NAME}}', {% endfor %}];
	public $model_name = '{{class_name}}';
	public $model_label = '{{class_name}}';

    // 可选配置 ==============>  {{ '{{{' }}
    /**
     * 可搜索字段
     */
    // public function search_list(){
    //     return [{% for col in columns %}'{{col.COLUMN_NAME}}', {% endfor %}];
    // }

    /**
     * 渲染数据行内容
     */
    // public function row_wrapper($row){
    //     return "<tr><td>{$row->name}: one line</td></tr>";
    // }

    /**
     * 设置自定义渲染行，必须结合 row_wrapper 方法使用
     */
    // public function enable_row_wrapper($row){
    //     return false; //$row->status == 0;
    // }

    /**
     * 设置行 class
     */
    // public function row_class($row){
    //     return "";
    // }

    /**
     * 设置行 style
     */
    // public function row_style($row){
    //     return "";
    // }
    // {{ '}}}' }}

    /**
     * 表单后端校验
     * 验证规则参考： https://doc.laravel-china.org/docs/5.3/validation#available-validation-rules
     */
    public function rule(){
		return [
			{% for col in columns %} '{{col.COLUMN_NAME}}' => 'required', {{PHP_EOL}} 
			{% endfor %}];
    }


    /**
     * 表单前端校验
     * 验证规则参考：https://jqueryvalidation.org/documentation/ 
     */
    public function front_validate(){
		return [
            'rules' => [
			{% for col in columns %}     '{{col.COLUMN_NAME}}' => [], {{PHP_EOL}} 
			{% endfor %}
],
            'messages' => [
			{% for col in columns %}     '{{col.COLUMN_NAME}}' => [], {{PHP_EOL}} 
			{% endfor %}
],
        ];
    }

    /**
     * 数据列表显示字段
     */
    public function display_list(){
        return [{% for col in columns %}'{{col.COLUMN_NAME}}', {% endfor %}];
    }


    public function admin_field(){
        return [
            {% for col in columns %}'{{col.COLUMN_NAME}}' => [
                'label' => '{{col.COLUMN_COMMENT}}',
            {% if col.DATA_TYPE == 'text' %}
            'widget' => [
                    'name' => 'textarea', //richeditor
                ],
            {% elseif col.DATA_TYPE == 'date' %}
            'widget' => [
                'name'=>'datetimepicker',
                'type'=>'date',
                'format'=>'yyyy-mm-dd',
                ],
            {% elseif col.DATA_TYPE == 'time' %}
            'widget' => [
                'name'=>'datetimepicker',
                'type'=>'time',
                'format'=>'HH:ii:ss',
                ],
            {% elseif col.DATA_TYPE == 'datetime' %}
    'widget' => [
                    'name'=>'datetimepicker',
                    'type'=>'datetime',
                    'format'=>'yyyy-mm-dd HH:ii:ss',
                ],
            {% elseif col.DATA_TYPE == 'timestamp' %}
    'widget' => [
                    'name'=>'datetimepicker',
                    'type'=>'datetime',
                    'format'=>'yyyy-mm-dd HH:ii:ss',
                ],
            {% endif %}
],

        {% endfor %}];
    }
}
