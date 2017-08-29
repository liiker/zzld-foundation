<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_auth_functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fun_name')->nullable(); //功能名称
            $table->string('fun_code')->nullable(); //功能编码
            $table->string('fun_type')->nullable(); //功能类型  模块  功能
            $table->string('fun_icon')->nullable(); //图标
            $table->string('url')->nullable(); //连接地址
            $table->string('target')->nullable(); //打开方式

            $table->integer('parent_func')->nullable(); //上级功能
            $table->integer('show_order')->nullable(); //展示顺序
            $table->text('remark')->nullable(); //备注
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('functions');
    }
}
