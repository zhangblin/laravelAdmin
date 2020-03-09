<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
class HomeController extends Controller
{
    //
    public function index()
    {
        return view("layouts.admin.default");
    }
    public function welcome(){
        return view("admin.welcome");
    }
    //获取菜单列表
    public function getMenuList()
    {
        $menu=Menu::where("status",1)->orderBy('order','asc')->get();
        $data["clearInfo"] = ["clearUrl" => "clear.json"];
        $data["homeInfo"] = ["title" => "欢迎页", "icon" => "fa fa-home", "href" => route('admin.welcome')];
        $data["logoInfo"] = ["title" => "LayuiMini", "image" => "/static/admin/images/logo.png", "href" => ""];
        $data["menuInfo"] = ["currency" => ["title" => "常规管理", "icon" => "fa fa-address-book", "child" =>grading($menu)
        ]];

        return $data;
    }
}
