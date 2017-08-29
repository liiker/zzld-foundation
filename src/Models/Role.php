<?php

namespace Zzld\Foundation\Models;

use Illuminate\Database\Eloquent\Model;
use Zzld\Foundation\Support\Adminable;

class Role extends Model
{
    use Adminable;

    protected $table = 't_auth_roles';
    protected $fillable = ['role_name', 'role_code', 'show_order', 'remark', ];
	public $model_name = 'role';
	public $model_label = '角色';

    /**
     * 可搜索字段
     */
    // public function search_list(){
    //     return ['role_name', 'role_code', 'show_order', 'remark', ];
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
			 'role_name' => 'required',  
			 'role_code' => 'required',  
			 'show_order' => 'required',  
			 'remark' => 'required',  
			];
    }

    /**
     * 数据列表显示字段
     */
    public function display_list(){
        return ['role_name', 'role_code', 'show_order', 'remark', ];
    }

	public function __toString(){
		return $this->role_name;
	}

    public function admin_field(){
        return [
            'role_name' => [
                'label' => '名称',
            ],

            'role_code' => [
                'label' => '编码',
            ],

            'show_order' => [
                'label' => '排序',
            ],

            'remark' => [
                'label' => '备注',
					'widget' => [
                    'name' => 'richeditor', //richeditor
					'rows' => 10,
                ],
            ],
		];
    }
}

