<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchdogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_auto_watchdogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(); //名称

            $table->string('check_type')->nullable(); //检测类型
            $table->string('check_entity')->nullable(); //检测实体
            $table->string('check_value')->nullable(); //检测值

            $table->string('res_type')->nullable(); //资源类型
            $table->string('res_name')->nullable(); //资源名称
            $table->string('res_value')->nullable(); //资源名称

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
        Schema::dropIfExists('watchdogs');
    }
}
