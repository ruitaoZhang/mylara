<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 2019/6/6
 * Time: 10:24
 */

class MyGuzzle
{

    public function get(){
        $client = new \GuzzleHttp\Client();

        $url = 'api-chr.com/admin/users/nationalities';
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
}