<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_auth_function_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('function_id')->nullable(); //功能
            $table->string('res_name')->nullable(); //资源名称： user role department position
            $table->string('res_value')->nullable(); //资源值： 对应资源名称的主键
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
        Schema::dropIfExists('function_configs');
    }
}
