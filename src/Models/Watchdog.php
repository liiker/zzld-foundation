<?php

namespace Zzld\Foundation\Models;

use Illuminate\Database\Eloquent\Model;
use Zzld\Foundation\Support\Adminable;

class Watchdog extends Model
{
    //
   use Adminable;

   public $model_name = 'watchdog';
   public $model_label = '后台权限';

   protected $table = 't_auth_watchdogs';
   protected $fillable = ['name', 'check_type', 'check_entity', 'check_value', 'res_type', 'res_name', 'res_value', 'remark', ];

   public function rule(){
       return [
       ];
   }

   public function search_list(){
       return ['name', 'check_type', 'res_type', 'res_name',];
   }

   /**
    * 数据列表显示字段
    */
   public function display_list(){
       return ['name', 'check_type', 'check_entity', 'res_type', 'res_name', 'res_value', ];
   }



   public function admin_field(){
       return [
           'name' => [
               'label' => '名称',
           ],

           'check_type' => [
               'label' => '类型',
           ],

           'check_entity' => [
               'label' => '检测实体',
           ],

           'check_value' => [
               'label' => '检测值',
           ],

           'res_type' => [
               'label' => '资源类型',
           ],

           'res_name' => [
               'label' => '资源名称',
           ],

           'res_value' => [
               'label' => '资源值',
           ],

           'remark' => [
               'label' => '说明',
                'widget' => [
                    'name' => 'textarea', //richeditor
               ],
           ],
       ];
   }
}
