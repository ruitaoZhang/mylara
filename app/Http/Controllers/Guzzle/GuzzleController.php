<?php

namespace App\Http\Controllers\Guzzle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuzzleController extends Controller
{
    public function testGetRequest(){
        $client = new \GuzzleHttp\Client();

        $url = route('getTestData');
        $array = [
            'headers' => [],
            'query' => [
                'search_name'=>'中'
            ],
            'http_errors' => false   #支持错误输出
        ];
        $response = $client->request('GET', $url, $array);
        dump($response->getStatusCode());   #打印响应信息
        dump(json_decode($response->getBody()->getContents()));   #输出结果
    }

    public function getTestData(){
        return response()->json(['code' => 200, 'msg' => 'success', 'data' => ['id' => 1, 'name' => 'rt']]);
    }
}
