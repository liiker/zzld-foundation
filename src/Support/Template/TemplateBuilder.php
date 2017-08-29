<?php

namespace Zzld\Foundation\Support\Template;

use Illuminate\Support\HtmlString;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Contracts\Routing\UrlGenerator;
use Config;

use Zzld\Foundation\Models\Functions;

/**
 * 自定义模板标签构造器
 */
class TemplateBuilder
{
    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Contracts\Routing\UrlGenerator
     */
    protected $url;

    /**
     * The View Factory instance.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $view;

    public function __construct(UrlGenerator $url = null, Factory $view)
    {
        $this->url = $url;
        $this->view = $view;
    }

    /**
     * 生成管理表格
     *
     */
    public function grid($page, $model, $params=null, $format='html', $view_snippet='snippet.grid'){
        $data = [
            'page'=>$page,
            'model'=>$model,
            'format'=>$format,
            'params'=>$params,
        ];

        return view("zzld-foundation::$view_snippet", $data);
    }

    /**
     * 生成管理表单
     *
     */
    public function form($modelIns, $model, $editable=false, $format='html', $view_snippet='zzld-foundation::snippet.form'){
        $data = [
            'modelIns' => $modelIns,
            'model' => $model,
            'editable' => $editable,
            'format' => $format,
        ];
        return view("$view_snippet", $data);
    }

	public function get_model($model_name){
        $models = Config::get('scaffold.models');
        $modelClass = isset($models[$model_name]) ? $models[$model_name] : null;
		return new $modelClass;
	}

	/**
	 * 获取指定model的所有数据
	 */
    public function model_list($model_name, $page=10){
        $models = Config::get('scaffold.models');
        $modelClass = isset($models[$model_name]) ? $models[$model_name] : null;
        return $modelClass::paginate($page);
    }

	/**
	 * 通过id获取指定模型的数据
	 */
	public function model_obj($model_name, $id){
        $models = Config::get('scaffold.models');
        $modelClass = isset($models[$model_name]) ? $models[$model_name] : null;
        return $modelClass::find($id);
	}

	/**
	 * 通过传入的key和value对模型进行查询并获取第一条数据
	 */
	public function model_find_obj($model_name, $key, $value=null){
        $models = Config::get('scaffold.models');
        $modelClass = isset($models[$model_name]) ? $models[$model_name] : null;

		if(is_array($key)){
			return $modelClass::where($key)->first();
		}
        return $modelClass::where($key, $value)->first();
	}

	/**
	 * 通过传入的key和value对模型进行查询并获取所有数据
	 */
	public function model_find_list($model_name, $key, $value=null, $page=50){
        $models = Config::get('scaffold.models');
        $modelClass = isset($models[$model_name]) ? $models[$model_name] : null;

		if(is_array($key)){
			return $modelClass::where($key)->paginate($page);
		}
        return $modelClass::where($key, $value)->paginate($page);
	}

    /**
     * 生成label标签
     */
    public function label($name, $for, $attrs=[]){

    }

    /**
     * 生成input标签
     */
    public function input($type, $name, $value="", $attrs=[]){
        $attrStr = "";
        foreach($attrs as $key=>$val){
            $attrStr .= " {$key}=\"{$val}\"";
        }
        return "<input id=\"id-{$name}\" name=\"{$name}\" type=\"{$type}\" value=\"{$value}\" {$attrStr}/>";
    }

    public function text($name, $value="", $attrs=[]){
        return $this->input("text", $name, $value, $attrs);
    }

    public function password($name, $value="", $attrs=[]){
        return $this->input("password", $name, $value, $attrs);
    }

    public function file($name, $value="", $attrs=[])
    {
        return $this->input("file", $name, $value, $attrs);
    }

    /**
     * 下拉框
     */
    public function select($name, $list, $value="", $attrs=[], $nullable=true, $isModel=false, $key="", $val="")
    {
        $attrStr = "";
        foreach($attrs as $key=>$attr){
            $attrStr .= " {$key}=\"{$attr}\"";
        }
        $options = $this->options($list, $value, $nullable, $isModel, $key, $val);
        return "<select name=\"{$name}\" {$attrStr}>{$options}</select>";
    }

    /**
     * 下拉框选项
     */
    public function options($list, $selected=null, $nullable=true, $isModel=false, $key="", $val="")
    {
        $html = "";
        if($nullable){
            $html .= "<option value=\"\">===请选择===</option>";
        }
        if($isModel){
            foreach($list as $obj){
                $_select = "";
                if($obj->$val == $selected){
                    $_select = " selected ";
                }
                $html .= "<option value=\"{$obj->$val}\" {$_select}>{$obj->key}</option>";
            }
        }else{
            foreach($list as $key => $val){
                $_select = "";
                if(!is_null($selected) && $key == $selected){
                    $_select = "selected";
                }
                $html .= "<option value=\"{$key}\" {$_select}>{$val}</option>";
            }
        }

        return $html;
    }

    /**
     * 生成日期选择框标签
     */
    public function datetime($name, $value, $attrs=[], $type="datetime"){
        $attrStr = "";
        foreach($attrs as $key=>$val){
            $attrStr .= " {$key}=\"{$val}\"";
        }
        return "<input class=\"form-control {$type}picker\" value=\"{$value}\" type=\"text\" name=\"{$name}\" id=\"id-{$name}\" $attrStr />";
    }

    public function time($name, $value, $attrs=[]){
        return $this->datetime($name, $value, $attrs, "time");
    }

    /**
     * 生成时间选择框
     */
    public function date($name, $value, $attrs=[]){
        return $this->datetime($name, $value, $attrs, "date");
    }

    /**
     * 生成富文框标签
     */
    public function richeditor(){

    }

    public function modelSelect($name, $value, $model_name, $search_field){
        $hidden = $this->input('hidden', $name, $value);
        $hidden = $hidden . $this->input('text', $name.'-show', '', ['model'=>$model_name, 'class'=>'form-control']);
        return $hidden . "<a style=\"position:absolute; top:0; right:0;height:39px;padding-top:12px;\" show-value=\"{$search_field}\" model=\"{$model_name}\" val-field=\"id-{$name}\" show-field=\"id-{$name}-show\" href=\"javascript:;\" class=\"btn btn-success model-input\"><i class=\"fa fa-search\">&nbsp;查询选择</i></a>";
    }

	/**
	 * 获取顶级菜单
	 */
	public function functions(){
        return (new Functions())->topFunctions();
	}
}
