<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_auto_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_name')->nullable(); // 部门名称
            $table->string('dept_code')->nullable(); // 部门编码，共8位长度,每两位表示一级部门： 10-00-10-00
            $table->integer('parent_dept')->nullable(); //上基部门
            $table->integer('show_order')->nullable(); //展示顺序
            $table->integer('dept_level')->nullable(); //部门级别
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
        Schema::dropIfExists('departments');
    }
}
