<?php

namespace App\Http\Controllers\FunctionController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaravelBuiltInFunctionController extends Controller
{
    /**
     * 路由辅助函数 route("xxx")
     * Route::get('getAdminUser', 'x@getAdminUser')->name('xxx');
     */
    public function testRouteFunc(){
        $url = route('getAdminUser');
        echo $url."<br/>";
        $url = route('getAdminUser', ['id' => 1]);
        echo $url."<br/>";
        $url = route('getAdminUser', ['id' => 1], false);
        echo $url."<br/>";
        // 输出：http://mylara.test/getAdminUser
        // http://mylara.test/getAdminUser?id=1
        // /getAdminUser?id=1
    }

    /**
     * each()
     * each()是一种迭代整个集合的简单方法。 它接受一个带有两个参数的回调：它正在迭代的项和键
     */
    public function testEach(){
        $users = User::limit(10)->get();
        //each - 遍历集合
        $res = $users->each(function ($item, $key){
            echo $key."<br/>";//key 下标从0开始
            if ($key == 3){
                return false;//返回false结束遍历
            }
        });
        dd($res);
    }

    /**
     * tap()
     * tap() 方法允许你随时加入集合。 它接受回调并传递并将集合传递给它。
     * 您可以对项目执行任何操作，而无需更改集合本身。
     * 因此，您可以在任何时候使用 tap 来加入集合，而不会改变集合
     */
    public function testTap(){
        $users = User::limit(10)->get();

        $res = $users->where('id', '>', 7)->tap(function ($items){
            //item 为传入的集合
            //此操作并不会改变res的结果
            $items->where('id', '>', 11);
            Log::error($items->values());//执行筛选后的值

            //可以在tap中改变数据值
            foreach ($items as $it){
                $it->id +=10000000;
                $it->save();
            }
        });
        dd($res);
    }

    /**
     * Contains()
     *方法只检查集合是否包含给定值
     */
    public function testContains(){
        $collect = collect(['country' => 'USA', 'state' => 'NY']);
        //通过值去查找
        var_dump($collect->contains('US'));//false
        var_dump($collect->contains('USA'));//true
        //通过键值对去查找
        var_dump($collect->contains('title', 'Not Found Title'));// false

        $res = $collect->contains(function ($item, $key){
            return strlen($item) > 2;
        });
        echo $res;//1

    }
}
