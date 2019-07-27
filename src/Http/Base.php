<?php
/**
 * 基类
 */

namespace Gxheart\Http;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use Gxheart\Middleware\RequestHandler;

class Base
{
    /**
     * @var client
     */
    public $client;

    /**
     * @var baseUrl
     */
    public $baseUrl = 'https://oapi.dingtalk.com/';

    /**
     * @var array
     */
    public $options = [
        'headers' => [
            'Content-Type' => 'application/json'
        ],
    ];

    /**
     * Base constructor.
     * @param string $baseUrl
     */
    public function __construct($baseUrl = '')
    {
        if ($baseUrl !== '') {
            $this->baseUrl = $baseUrl;
        }
        $this->getClient();
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        $handler = new CurlHandler();
        $stack = HandlerStack::create($handler);
        $stack->push(new RequestHandler());

        $this->client = new Client([
            'verify' => false,
            'base_uri' => $this->baseUrl,
            'timeout' => 3000,
            'handler' => $stack
        ]);
        return $this->client;
    }

    /**
     * error response
     * @param $e
     * @param string $type
     * @return array|false|string
     */
    public function errorResponse($e, $type = "json")
    {
        $data = [
            'errcode' => $e->getCode(),
            'errmsg' => $e->getMessage(),
            'data' => [],
        ];
        return $type === 'json' ? json_encode($data) : $data;
    }
}
