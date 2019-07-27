<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Login;

class UserController extends Controller
{
    public function useSubSelectGetUserLastLogin()
    {
        // 方式一
        // $users = User::all(); // 使用这种方式会造成多次操作数据库，使用 预加载来解决

        // 方式二
        $users = User::with('logins')->get(); // 当数据量比较大的时候，使用预加载会造成占用过多的内存
                                                        // 使用 子查询 来解决

        // 方式三
        /*$lastLogin = Login::select('updated_at')
            ->whereColumn('user_id', 'users.id')
            ->latest('updated_at')
            ->limit(1)
            ->getQuery();

        $users = User::select('users.*')
            ->selectSub($lastLogin, 'last_login_at')
            ->get();*/

        // 方式四 使用 Marco宏 来简化代码
        /*$users = User::addSubSelect('last_login_at', Login::select('updated_at')
            ->whereColumn('user_id', 'users.id')
            ->latest('updated_at')
        )->get();*/

        // 方式五 使用 Scoap 来进一步优化代码
        // $users = User::withLastLoginDate()->get();

        // 增加获取最后登录的ip
        // $users = User::withLastLoginDate()->withLastLoginIpAddress()->get();

        // 通过关联获取模型实例
        //$users = User::withLastLogin()->get();

        //获取当个用户最后登录的信息
        // $lastLogin = User::first()->lastLogin; // 会返回null

//        foreach ($users as $user) {
//            dd($user->last_login_at);
//        }
        return view('showUserLastLogin', compact('users'));
    }
}
