<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['index']
        ]);
    }

    //
    public function index()
    {
        return view("admin.login");
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ], [
            'captcha.required' => "验证码不能为空",
            'captcha.captcha' => "验证码不正确",
        ]);
        unset($credentials["captcha"]);
        if (Auth::attempt($credentials)) {
            // 登录成功后的相关操作
            return ["code" => 200, "msg" => "登录成功", "data" => ["url"=>route('admin.home')]];
        } else {
            // 登录失败后的相关操作

        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return ["code"=>200,"msg"=>"您已成功退出","data"=>["url"=>route('login')]];
    }
}
