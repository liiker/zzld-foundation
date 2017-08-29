# ZZLD-Foundation

> 注意:本框架以Laravel 5.3 为基础进行开发。此版本为开发预览版，接口及功能已经趋于稳定，但是部分功能还未实现

中正联达基础框架，主要包括以下功能:
1. 基于模型配置的后端管理脚手架(常规的CRUD 功能)
2. 基于角色的权限管理(用户 角色 部门 职位)


## 安装

#### 安装包文件

```shell
composer require "liiker/zzld-foundation:*"
```

> 注意:由于本项目暂时为放到[github](http://github.com) 而且没有同步到 [packagist](https://packagist.org) 上面，所以暂时无法通过此方法进行安装

#### 本地安装

1. 将扩展包项目通过git同步到本地的任意路径下，比如: /home/users/path/packages
```shell
git clone git@git.oschina.net:nxzzld/packages.git
```

2. 修改composer.json文件添加本地 repository 
```php
repositories:[
  {
	  type: path,
	  url: /home/users/path/packages/* //<=上一步的路径
  },
  ...
],
```

3. 修改composer.json 文件，在 require 中添加：
```php
require: {
...
"zzld/foundation":"*@dev" //<=注意:版本必须为:*@dev
...
}
```

4. 在项目目录下执行： 
```shell
composer require
```
进入项目的vendor目录下目录下如果看到`zzld/foundation`这个目录则安装成功

## 配置

1. 修改 config/app.php 文件，在 `providers` 中添加 `Zzld\Foundation\Providers\FoundationServiceProvider::class`
2. 运行命令 `./artisan vendor:publish` 将扩展的配置和资源文件同步到项目目录下


## 模型配置方法
为了将重复劳动降低到最低，通过`Adminable`实现了通用模型的CRUD功能。可以方便的进行基本后台管理。

#### 模型参考实例
```
namespace Zzld\Foundation\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zzld\Foundation\Support\Adminable;
use Hash;

class User extends Authenticatable
{
    use Notifiable; //推送相关
    use Adminable; //添加模型基本配置信息
    use HasApiTokens; //用户认证相关
	
    public $model_name = 'user'; //模型对应的名称
    public $model_label = '用户1'; //模型显示名称

	//在生成json数据时候不需要显示的字段
    protected $hidden = [
        'password', 'remember_token',
    ];

	/*
	 * 模型关联的表
	 */
	protected $table = 'users';

	/**
	 * 可自动填充的地段
	 */
    protected $fillable = ['name', 'account', 'email', 'password', 'status', 'last_login', 'remember_token', ];


    /**
     * 数据列表显示字段
     */
    public function display_list(){
        return ['name', 'role', 'account', 'email', 'password', 'status', 'last_login'];
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
        return false;
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
     * 表单校验, 使用laravel框架默认校验规则
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


	//外键关联
	public function role(){
		return $this->belongsTo('Zzld\Foundation\Models\Role');
	}

	//外键关联
	public function department(){
		return $this->belongsTo('Zzld\Foundation\Models\Department');
	}

	//外键关联
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

            'account' => [
                'label' => '帐号',
            ],

            'email' => [
                'label' => '邮箱',
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

            'last_login' => [
                'label' => '最后登陆时间',
                'widget' => [
                    'name'=>'datetimepicker',
                    'type'=>'date',
                    'format'=>'yyyy-mm-dd HH:ii:ss',
                ],
            ],

            'remember_token' => [
                'label' => '记住我Token',
                'widget' => [
                    'name' => 'upload',
                    'type' => 'file',
                    'options' => '{"size":1024000, "ext":"pdf|txt|doc|xls"}', //json格式描述数据:主要用来限制文件大小和文件类型
                ],
            ],

			'role' => [
				'label' => '角色',
				'virtual' => true,
			]

        ];
    }
    public function __toString(){
        return $this->name;
    }
}
```


#### 字段类型

##### 普通文本:

##### 外键(模型):
参考实例

```
 'type_id' => [
     'link' => 'dishestype',
     'label' => '菜品类型',
     'model' => [
         'name' => 'dishestype',
         'bind_field' => 'name',
         'key' => 'id',
         /*
         'list' => function(){
             return DishesType::all();
         }
         ┊*/
     ],
 ],
```

> 配置属性说明
> 1. link 在列表中这个字段中显示链接，与对应的数据进行关联（以脚手架形式进行展示）
> 2. model 外键关联的模型
> 3. model.name 外键关联的模型
> 4. model.bind_field 编辑和添加页面中外键下拉框对应显示的属性
> 5. model.key 编辑和添加页面中外键下拉框对应的值
> 6. model.list 如果编辑和添加中显示的是某个外表中一部分数据可以通过list来指定，list是一个方法，返回的是laravel模型信息
