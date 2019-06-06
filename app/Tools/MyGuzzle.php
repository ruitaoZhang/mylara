<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 2019/6/6
 * Time: 10:24
 */

class MyGuzzle
{

    public static  function get()
    {
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

    static public function post()
    {
        $client = new \GuzzleHttp\Client();

        $url = 'api-chr.com/admin/users/nationalities';
        $array = [
            'json' => [
                'name'=>'意大利',
                'en_name'=>'Italy',
                'kyc_type'=>1,
                'order'=>0,
                'is_forbid'=>0,
            ],
            'query' => [],
            'http_errors' => false
        ];
        $response = $client->request('post', $url, $array);
        dump($response->getStatusCode());   #打印响应信息
        dump(json_decode($response->getBody()->getContents()));   #输出结果
    }

    public static  function put()
    {
        $client = new \GuzzleHttp\Client();

        $url = 'api-chr.com/admin/users/nationalities/6';
        $array = [
            'json' => [
                'name'=>'意大利1',
                'en_name'=>'Italy1',
                'kyc_type'=>1,
                'order'=>0,
                'is_forbid'=>0,
            ],
            'query' => [],
            'http_errors' => false
        ];
        $response = $client->request('put', $url, $array);
        dump($response->getStatusCode());   #打印响应信息
        dump(json_decode($response->getBody()->getContents()));   #输出结果
    }

    public static  function delete()
    {
        $client = new \GuzzleHttp\Client();

        $url = 'api-chr.com/admin/users/nationalities/6';
        $array = [
            'json' => [],
            'query' => [],
            'http_errors' => false
        ];
        $response = $client->request('delete', $url, $array);
        dump($response->getStatusCode());   #打印响应信息
        dump(json_decode($response->getBody()->getContents()));   #输出结果
    }

    public static  function upload()
    {
        $client = new \GuzzleHttp\Client();
        $body = fopen('/home/summer/图片/dog1.jpg', 'r');
        $response = $client->request('POST', 'http://account.chr.test/upload',
            [
                'multipart' => [
                    [
                        'name' => 'body',
                        'contents' => fopen('/home/summer/图片/dog1.jpg', 'r')
                    ],
                ]
            ]
        );
        dump($response->getStatusCode());   #打印响应信息
        dump($response->getBody());
        dump(json_decode($response->getBody()->getContents()));   #输出结果
    }
}