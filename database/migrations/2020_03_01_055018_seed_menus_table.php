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
                'id' => '1',
                'title' => '系统设置',
                'pid' => '0',
                'icon' => 'fa fa-gears',
                'href' => '',
                'target' => '_self',
                'order' => '0',
                'status' => '1',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'id' => '2',
                'title' => '菜单管理',
                'pid' => '1',
                'icon' => 'fa fa-window-maximize',
                'href' => route('menu.index'),
                'target' => '_self',
                'order' => '0',
                'status' => '1',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => "3",
                "title" => "权限管理",
                "pid" => "1",
                "icon" => "fa fa-sliders",
                "href" => "",
                "target" => "_self",
                "order" => "5",
                "status" => "1",
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => "4",
                "title" => "网站设置",
                "pid" => "1",
                "icon" => "fa fa-tasks",
                "href" => "",
                "target" => "_self",
                "order" => "2",
                "status" => "1",
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => "5",
                "title" => "用户管理",
                "pid" => "1",
                "icon" => "fa fa-user",
                "href" => route('user.index'),
                "target" => "_self",
                "order" => "3",
                "status" => "1",
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                "id" => "6",
                "title" => "角色管理",
                "pid" => "1",
                "icon" => "fa fa-users",
                "href" => "",
                "target" => "_self",
                "order" => "4",
                "status" => "1",
                'created_at' => $time,
                'updated_at' => $time
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
