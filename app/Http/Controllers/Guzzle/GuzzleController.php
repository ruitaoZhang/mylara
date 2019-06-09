<?php

namespace App\Http\Controllers\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class GuzzleController extends Controller
{
    /**
     * 直接通过 request 方式去请求
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
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

    /**
     * 通过 base_uri 去请求
     */
    public function testGetRequest1(){
        $client = new Client([
            'base_uri' => 'http://mylara.test/guzzle/',
            'timeout' => 2.0
        ]);

        $res = $client->get('getTestData');
        dd($res->getBody()->getContents());
    }

    /**
     * 通过 send 去请求
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetSend(){
        $client = new Client();
        $request = new \GuzzleHttp\Psr7\Request('PUT', 'http://mylara.test/guzzle/getTestData');
        try{
            $response = $client->send($request, ['timeout' => 2, 'http_errors' => true, 'query' => ['foo' => 'bar']]);
            dump(json_decode($response->getBody()->getContents()));   #输出结果
        }catch (\Exception $e) {
            var_dump($e->getRequest());
            var_dump($e->getResponse());
        }

    }


    public function testPostRequest(){
        $client = new Client();
        $response = $client->request('POST', 'http://mylara.test/guzzle/getTestData', [
            'multipart' => [
                [
                    'name'     => 'field_name1',
                    'contents' => 'abc'
                ],
                [
                    'name'     => 'other_file1',
                    'contents' => 'hello',
                    'filename' => 'filename.txt',
                    'headers'  => [
                        'X-Foo' => 'this is an extra header to include'
                    ]
                ]
            ]
        ]);

        dd($response->getBody());
    }

    public function testPostRequest1(){
        $client = new Client();
        $response = $client->request('POST', 'http://mylara.test/guzzle/getTestData', [
            'json' => [
                'phone' => 15622222222,
                'name' => 'zrt',
            ]
        ]);

        dd($response->getBody());
    }

    public function getTestData(Request $request){
        Log::error($request->getMethod());
        Log::error($request->all());
//        Log::error($request->getBody());
        return response()->json(['code' => 200, 'msg' => 'success', 'data' => ['id' => 1, 'name' => 'rt']]);
    }
}
