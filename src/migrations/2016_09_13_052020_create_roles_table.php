<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_auth_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name')->nullable(); //角色名称
            $table->string('role_code')->nullable(); //角色编码
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
        Schema::dropIfExists('roles');
    }
}
