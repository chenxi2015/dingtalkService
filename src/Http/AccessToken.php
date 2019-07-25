<?php

namespace Gxheart\Http;

use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class AccessToken extends Base
{
    /**
     * 获取access token
     * @param $appKey
     * @param $appSecret
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessToken($appKey, $appSecret)
    {
        try {
            $this->options['query'] = [
                'appkey' => $appKey,
                'appsecret' => $appSecret
            ];
            $response = $this->client->request('GET', Router::GET_ACCESS_TOKEN_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}