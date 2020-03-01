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

    public function create()
    {
        return view("admin.menu.create", ["menuList" => Menu::all()]);
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
