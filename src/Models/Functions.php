<?php

namespace Zzld\Foundation\Models;

use Illuminate\Database\Eloquent\Model;
use Zzld\Foundation\Support\Adminable;

class Functions extends Model
{
    use Adminable;

    protected $table = 't_auth_functions';
    protected $fillable = ['fun_name', 'fun_code', 'fun_type', 'fun_icon', 'url', 'target', 'parent_func', 'show_order', 'remark', ];
	public $model_name = 'functions';
	public $model_label = '功能';

    /**
     * 可搜索字段
     */
    // public function search_list(){
    //     return ['fun_name', 'fun_code', 'fun_type', 'fun_icon', 'url', 'target', 'parent_func', 'show_order', 'remark', ];
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

    /**
     * 表单校验
     * 验证规则参考： https://doc.laravel-china.org/docs/5.3/validation#available-validation-rules
     */
    public function rule(){
		return [
			 'fun_name' => 'required',
			 'fun_code' => 'required',
			 'fun_type' => 'required',
			 'fun_icon' => 'required',
			 // 'url' => 'required',
			 'target' => 'required',
			 // 'parent_func' => 'required',
			 'show_order' => 'required',
			 // 'remark' => 'required',
			];
    }

	public function subs(){
		return $this->hasMany('Zzld\Foundation\Models\Functions', 'parent_func');
	}

    /**
     * 数据列表显示字段
     */
    public function display_list(){
        return ['fun_name', 'fun_code', 'fun_type', 'fun_icon', 'url', 'target', 'parent_func', 'show_order', 'remark', ];
    }

	public function __toString(){
		return $this->fun_name;
	}


    /**
     * 获取顶级菜单
     */
    public function topFunctions(){
        return $this->where('parent_func', 0)->get();
    }

    /**
     * 获取当前菜单的子菜单
     */
    public function subFunctions(){
        return $this->where('parent_func', $this->id)->get();
    }

    public function admin_field(){
        return [
            'fun_name' => [
                'label' => '功能名称',
            ],

            'fun_code' => [
                'label' => '编码',
            ],

            'fun_type' => [
                'label' => '类型',
            ],

            'fun_icon' => [
                'label' => '图标',
            ],

            'url' => [
                'label' => 'URL',
            ],

            'target' => [
                'label' => '打开方式',
				'widget' => [
					'name' => 'selector',
					'options' => [
                        '' => '未设置',
						'_self' => '当前页',
						'_blank' => '新页面',
						'_parent' => '父页面',
					]
				],
            ],

            'parent_func' => [
                'label' => '上级功能',
				'model' => [
					'name' => 'functions',
					'bind_field' => 'name',
					'key' => 'id',
				],
            ],

            'show_order' => [
                'label' => '展示顺序',
            ],

            'remark' => [
                'label' => '',
				'widget' => [
                    'name' => 'textarea', //richeditor
                ],
            ],

		];
    }
}
