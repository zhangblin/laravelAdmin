<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title")->comment("菜单名称");
            $table->integer("pid")->default("0")->comment("上级菜单id");
            $table->string("icon")->comment("菜单图标")->nullable();
            $table->string("href")->comment("菜单url")->nullable();
            $table->string("target")->comment("target")->default("_self");
            $table->integer("order")->default("0")->comment("排序");
            $table->tinyInteger("status")->default("1")->comment("状态");
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
        Schema::dropIfExists('menus');
    }
}
