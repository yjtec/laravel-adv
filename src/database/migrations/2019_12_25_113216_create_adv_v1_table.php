<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvV1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_v1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->integer('platform_id')->default(0)->comment('平台ID 默认为 0');
            $table->integer('type_id')->default(0)->comment('类型ID 默认为0');
            $table->string('pic')->nullable()->comment('图片地址');
            $table->string('link')->nullable()->comment('连接地址');
            $table->string('remark')->nullable()->comment('描述');
            $table->tinyInteger('status')->default(1)->comment('状态：1正常 -1关闭');
            $table->tinyInteger('weight')->default(0)->comment('排序');
            $table->timestamps();
            $table->comment = "banner管理表";
        });
        Schema::create('banner_type_v1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('类型名称');
            $table->timestamps();
            $table->comment = "banner类型表";
        });
        Schema::create('banner_platform_v1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('平台名称');
            $table->string('short_title')->comment('简称');
            $table->timestamps();
            $table->comment = "banner平台表";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_v1');
        Schema::dropIfExists('banner_type_v1');
        Schema::dropIfExists('banner_platform_v1');
    }
}
