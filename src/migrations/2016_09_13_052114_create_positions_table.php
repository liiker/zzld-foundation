<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_auth_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pos_name')->nullable(); //职位名称
            $table->string('pos_code')->nullable(); //职位编码
            $table->integer('pos_level')->nullable(); //职位级别
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
        Schema::dropIfExists('positions');
    }
}
