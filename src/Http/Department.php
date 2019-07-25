<?php


namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Department extends Base
{
    public function createDepartInfo($accessToken, $userId)
    {
        try {
            $this->options['query'] = [
                'userid' => $userId,
                'access_token' => $accessToken
            ];
            $response = $this->client->request('GET', Router::DELETE_USER_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}