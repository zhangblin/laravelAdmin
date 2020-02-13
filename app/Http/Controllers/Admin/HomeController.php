<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $data["clearInfo"] = ["clearUrl" => "clear.json"];
        $data["homeInfo"] = ["title" => "欢迎页", "icon" => "fa fa-home", "href" => route('admin.welcome')];
        $data["logoInfo"] = ["title" => "LayuiMini", "image" => "/static/admin/images/logo.png", "href" => ""];
        $data["menuInfo"] = ["currency" => ["title" => "常规管理", "icon" => "fa fa-address-book", "child" => [
            ["title" => "系统设置", "icon" => "fa fa-gears", "target" => "_self", "child" => [
                ["title" => "菜单管理", "href" =>'', "icon" => "fa fa-window-maximize", "target" => "_self"],
            ]],
            ["title" => "表单示例", "href" => '', "icon" => "fa fa-calendar", "target" => "_self", "child" => [
                ["title" => "普通表单", "href" => "page/form.html", "icon" => "fa fa-list-alt", "target" => "_self"],
                ["title" => "分步表单", "href" => "page/form-step.html", "icon" => "fa fa-navicon", "target" => "_self"]
            ]],
        ]]];
        return $data;
    }
}
