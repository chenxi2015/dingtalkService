<?php


namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Application extends Base
{

    /**
     * 获取应用列表
     * @param $accessToken
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMicroAppList($accessToken)
    {
        try {
            $response = $this->client->request('POST', Router::GET_MICROAPP_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取员工可见的应用列表
     * @param $accessToken
     * @param $userId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMicroAppListByUid($accessToken, $userId)
    {
        try {
            $this->options['query'] = [
                'access_token'  => $accessToken,
                'userid'        => $userId,
            ];
            $response = $this->client->request('GET', Router::GET_MICROAPP_LIST_BYUID_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取应用的可见范围
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMicroAppVisibleScopes($accessToken, $agentId)
    {
        try {
            $this->options['form_params'] = [
                'agentId' => $agentId,
            ];
            $response = $this->client->request('POST', Router::GET_MICROAPP_VISIBLE_SCOPES_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 设置应用的可见范围
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setMicroAppVisibleScopes($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'agentId'           => $data['agentId'],
                'isHidden'          => isset($data['isHidden']) ? $data['isHidden'] : true,
                'deptVisibleScopes' => isset($data['deptVisibleScopes']) ? $data['deptVisibleScopes'] : '{}',
                'userVisibleScopes' => isset($data['userVisibleScopes']) ? $data['userVisibleScopes'] : '{}',
            ];
            $response = $this->client->request('POST', Router::SET_MICROAPP_VISIBLE_SCOPES_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}