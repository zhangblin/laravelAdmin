<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        return view("admin.menu.index");
    }

    //菜单内列表
    public function menuList()
    {
        $data["code"] = 0;
        $data["msg"] = '';
        $data["count"] = Menu::count();
        $data["data"] = Menu::all();
        return $data;
    }

    public function create(Menu $menu)
    {
        $menuList = Menu::all();
        return view("admin.menu.create_and_edit", compact('menu', 'menuList'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => 'required|max:50',
            "pid" => 'required|numeric',
            "order" => 'numeric'
        ]);
        Menu::create($request->all());

        return ["code" => 200, "msg" => "新增成功"];
    }

    public function show(Menu $menu)
    {
        $menuList = Menu::all();
        return view("admin.menu.create_and_edit", compact('menu', 'menuList'));
    }

    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            "title" => 'max:50',
            "pid" => 'numeric',
            "order" => 'numeric'
        ]);
        $menu->update($request->all());
        return ["code" => 200, "msg" => "修改成功"];
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return ["code" => 200, "msg" => "删除成功"];
    }
}
