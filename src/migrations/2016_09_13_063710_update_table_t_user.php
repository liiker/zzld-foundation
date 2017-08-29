<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableTUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('role_id')->nullable(); // 角色
            $table->integer('department_id')->nullable(); //部门
            $table->integer('position_id')->nullable(); //职位

            $table->integer('is_supper_admin')->nullable()->default(0); //是否是超管
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_user', function (Blueprint $table) {
            //
        });
    }
}
