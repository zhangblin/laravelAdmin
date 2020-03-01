<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $time = date('Y-m-d H:i:s');
        $categories = [
            [
                'id'=>'1',
                'title' => '系统设置',
                'pid' => '0',
                'icon' => 'fa fa-gears',
                'href' => '',
                'target' => '_self',
                'order' => '0',
                'status' => '1',
                'created_at'=>$time,
                'updated_at'=>$time
            ],
            [
                'id'=>'2',
                'title' => '菜单管理',
                'pid' => '1',
                'icon' => 'fa fa-window-maximize',
                'href' => 'http://admin.test/admin/menu',
                'target' => '_self',
                'order' => '0',
                'status' => '1',
                'created_at'=>$time,
                'updated_at'=>$time
            ],
        ];

        DB::table('menus')->insert($categories);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
