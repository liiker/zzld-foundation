<?php

namespace Zzld\Foundation\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zzld\Foundation\Support\Adminable;
use Hash;

class User extends Authenticatable
{
    use Notifiable, Adminable, HasApiTokens;

    public $model_name = 'user';
    public $model_label = '用户1';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    protected $fillable = ['name', 'account', 'email', 'password', 'status', 'remember_token', 'role_id'];


    /**
     * 数据列表显示字段
     */
    public function display_list(){
        return ['name', 'role_id', 'telphone', 'email', 'password', 'status', ];
    }

    /**
     * 可搜索字段
     */
    public function search_list(){
        return ['name', 'account', 'email', 'status'];
    }

    /**
     * 渲染数据行内容
     */
    public function row_wrapper($row){
        return "<tr><td>{$row->name}: one line</td></tr>";
    }

    /**
     * 设置自定义渲染行，必须结合 row_wrapper 方法使用
     */
    public function enable_row_wrapper($row){
        return false; //$row->status == 0;
    }

    /**
     * 设置行 class
     */
    public function row_class($row){
        if($row->status==2){
            return 'warning';
        }else if($row->status==0){
            return 'danger';
        }
    }

    /**
     * 设置行 style
     */
    public function row_style($row){
        return "";
    }

    /**
     * 表单校验
     */
    public function rule(){
        return [
            'name' => 'required|min:6|max:50',
            'password' => 'required|min:6',
            'email' => 'required|email',
        ];
    }

    public function before_save(){
        if($this->password){
            $this->password = Hash::make($this->password);
        }
    }

    public function before_update(){
        if($this->password){
            $this->password = Hash::make($this->password);
        }
    }

	public function role(){
		return $this->belongsTo('Zzld\Foundation\Models\Role');
	}

	public function department(){
		return $this->belongsTo('Zzld\Foundation\Models\Department');
	}

	public function position(){
		return $this->belongsTo('Zzld\Foundation\Models\Position');
	}


    /**
     * 配置字段展示属性
     */
    public function admin_field(){
        return [
            'name' => [
                'label' => '姓名',
                'tip' => '<span class="text-danger">*此项目必填</span>',
            ],

            'telphone' => [
                'label' => '联系电话',
            ],
            'account' => [
                'label' => '帐号',
            ],

            'email' => [
                'label' => '邮箱',
            ],

			'role_id' => [
				'label' => '角色',
				'model' => [
					'name' => 'role',
					'bind_field' => 'role',
					'key' => 'id',
				],
			],

            'password' => [
                'label' => '密码',
                'field_wrapper' => function($val){
                    return "****";
                }
            ],

            'status' => [
                'label' => '状态',
                'widget' => [
                    'name' => 'selector',
                    'options' => [
                        '' => '未设置',
                        '0' => '禁用',
                        '1' => '启用',
                        '2' => '密码过期',
                    ],
                    'nullable' => false,
                ],
                'field_wrapper' => function($val){
                    if($val==0){
                        return "<span class=\"glyphicons glyphicons-ban text-danger\"></span>";
                    }else if($val==1){
                        return "<span class=\"glyphicons glyphicons-ok text-success\"></span>";
                    }else if($val==2){
                        return "<span class=\"glyphicons glyphicons-circle_exclamation_mark text-warning\"></span>";
                    }
                }
            ],

            'remember_token' => [
                'label' => '记住我Token',
				/*
                'widget' => [
                    'name' => 'upload',
                    'type' => 'file',
                    'options' => '{"size":1024000, "ext":"pdf|txt|doc|xls"}', //json格式描述数据:主要用来限制文件大小和文件类型
                ],
				 */
            ],


        ];
    }
    public function __toString(){
        return $this->name;
    }
}
