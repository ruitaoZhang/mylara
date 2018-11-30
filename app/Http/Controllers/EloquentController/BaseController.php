<?php

namespace App\Http\Controllers\EloquentController;

use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //从结果集中通过id查找
    public function getAdminUser(){
        $admin = Admin::where('user_name', 'like', '%admin%')->find(1);
        clock()->info('wrd');
        clock()->startEvent('twitter-api-call', "Loading users latest tweets via Twitter API");
        clock()->endEvent('twitter-api-call');
    }

}
