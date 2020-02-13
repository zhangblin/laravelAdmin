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
    public function menuList(){
        $data["code"] = 0;
        $data["msg"] = '';
        $data["count"] = 19;
        $data["data"] = [
            [
                "authorityId" => 1,
                "authorityName" => "系统管理",
                "orderNumber" => 1,
                "menuUrl" => null,
                "menuIcon" => "layui-icon-set",
                "createTime" => "2018/06/29 11:05:41",
                "authority" => null,
                "checked" => 0,
                "updateTime" => "2018/07/13 09:13:42",
                "isMenu" => 0,
                "parentId" => -1
            ],
        ];
        Menu::all();
        return $data;
    }

    public function create()
    {
        return view("admin.menu.create");
    }


    public function store(Request $request)
    {
        $data = $this->validate($request,[
           "title"=>'required|max:50',
           "pid"=>'required|number',
           "order"=>'number'
        ]);

        Menu::create($data);

        return ["code"=>200,"msg"=>"新增成功"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
