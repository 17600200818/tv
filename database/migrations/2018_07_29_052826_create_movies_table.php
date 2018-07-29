<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->comment('电影标题');
            $table->string('cover')->nullable()->comment('封面海报');
            $table->text('description')->nullable()->comment('简介');
            $table->string('genre', 50)->nullable()->comment('电影类别');
            $table->string('country', 50)->nullable()->comment('国家地区');
            $table->string('release_date', 50)->nullable()->comment('上映日期');
            $table->string('runTime', 50)->nullable()->comment('片长');
            $table->text('download_url')->nullable()->comment('下载连接');
            $table->text('baidu_netdisk')->nullable()->comment('百度云盘');
            $table->integer('is_banner')->default(0)->comment('0:普通电影 1:作为网站banner的电影');
            $table->integer('is_valid')->default(1)->comment('0:不生效 1:生效');
            $table->integer('recommend')->default(0)->comment('0:普通电影 其他数字代表推荐权重 数字越大越靠前');
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
        Schema::dropIfExists('movies');
    }
}
