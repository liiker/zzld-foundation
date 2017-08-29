<?php

namespace Zzld\Foundation\Models;

use Illuminate\Database\Eloquent\Model;
use Zzld\Foundation\Support\Adminable;

class Department extends Model
{
    use Adminable;

    protected $table = 't_auth_departments';
    protected $fillable = ['dept_name', 'dept_code', 'parent_dept', 'show_order', 'dept_level', 'remark', ];
    public $model_name = 'department';
    public $model_label = '部门管理';

    /**
     * 可搜索字段
     */
    // public function search_list(){
    //     return ['dept_name', 'dept_code', 'parent_dept', 'show_order', 'dept_level', 'remark', ];
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
             'dept_name' => 'required',  
             'dept_code' => 'required',  
             'parent_dept' => 'required',  
             'show_order' => 'required',  
             'dept_level' => 'required',  
             'remark' => 'required',  
            ];
    }

    /**
     * 数据列表显示字段
     */
    public function display_list(){
        return ['dept_name', 'dept_code', 'parent_dept', 'show_order', 'dept_level', 'remark', ];
    }


    public function admin_field(){
        return [
            'dept_name' => [
                'label' => '部门名称',
            ],

            'dept_code' => [
                'label' => '部门编码',
            ],

            'parent_dept' => [
                'label' => '上级部门',
                'model' => [
                    'name' => 'department',
                    'key' => 'id',
                ],
            ],

            'show_order' => [
                'label' => '展示顺序',
            ],

            'dept_level' => [
                'label' => '部门级别',
            ],

            'remark' => [
                'label' => '备注',
                        'widget' => [
                    'name' => 'textarea', //richeditor
                ],
            ],

        ];
    }

    public function __toString(){
        return $this->dept_name;
    }

}
