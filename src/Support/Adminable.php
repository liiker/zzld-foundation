<?php

namespace Zzld\Foundation\Support;


trait Adminable
{
    /**
     * 数据列表显示字段
     */
    public function display_list(){
        return [];
    }

    /**
     * 可搜索字段
     */
    public function search_list(){
        return [];
    }

    /**
     * 配置绑定模型信息
     */
    public function model_bind(){
        return [];
    }

    /**
     * 渲染数据行内容
     */
    public function row_wrapper($row){
        return "";
    }

    /**
     * 设置自定义渲染行，必须结合 row_wrapper 方法使用
     * 返回 True 则调用 row_wrapper , 否则使用模板中的列表行进行渲染
     */
    public function enable_row_wrapper($row){
        return false;
    }

    /**
     * 设置行 class
     */
    public function row_class($row){
        return "";
    }

    /**
     * 设置行 style
     */
    public function row_style($row){
        return "";
    }

    /**
     * 配置模型字段属性
     */
    public function admin_field(){
        return [];
    }

	/**
	 * 配置一对多模型的关联关系
	 */
	public function rela_model(){
		return [];
	}

	/**
	 * 获取指定字段的options中的值
	 */
	public function get_field_options($field, $val){
		if(isset($this->admin_field()[$field]['widget']['options'][$val])){
			return $this->admin_field()[$field]['widget']['options'][$val]; 
		}else{
			return '无效值';
		}
	}

    /**
     * 数据操作钩子
     */
    public function before_save(){}
    public function after_save(){}
    public function before_update(){}
    public function after_update(){}
    public function before_destory(){}
    public function after_destory(){}
}
