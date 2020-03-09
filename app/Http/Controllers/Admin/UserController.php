<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return view("admin.user.index");
    }

    public function edit(User $user)
    {
        return view("admin.user.user", compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'required|confirmed|min:6'
        ]);

        $user->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);
        return ["code" => 200, "msg" => "修改成功"];
    }

    public function getUsers()
    {
        $data["code"] = 0;
        $data["msg"] = '';
        $data["count"] = User::count();
        $data["data"] = User::orderBy('id', 'asc')->get();
        return $data;
    }
}
