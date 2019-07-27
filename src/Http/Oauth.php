<?php
/**
 * 身份验证
 */

namespace Gxheart\Http;

use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Oauth extends Base
{
    /**
     * 获取用户userid（企业内部应用免登）
     * @param $accessToken
     * @param $code
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserId($accessToken, $code)
    {
        try {
            $this->options['query'] = [
                'access_token' => $accessToken,
                'code' => $code
            ];
            $response = $this->client->request('GET', Router::GET_USER_ID_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取应用后台免登的accessToken（管理后台免登流程开发）
     * @param $corpId
     * @param $corpSecret
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSSOAccessToken($corpId, $corpSecret)
    {
        try {
            $this->options['query'] = [
                'corpid' => $corpId,
                'corpsecret' => $corpSecret
            ];
            $response = $this->client->request('GET', Router::GET_SSO_TOKEN_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取应用管理员的身份信息（管理后台免登流程开发）
     * @param $accessToken
     * @param $code
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSSOUserInfo($accessToken, $code)
    {
        try {
            $this->options['query'] = [
                'access_token' => $accessToken,
                'code' => $code
            ];
            $response = $this->client->request('GET', Router::GET_SSO_USER_INFO_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 构造扫码登录页面（扫码登录第三方网站）
     * @param $appId
     * @param $redirectUrl
     * @return string
     */
    public function createQrCodeLoginUrl($appId, $redirectUrl)
    {
        return $this->baseUrl . Router::CREATE_QRCODE_LOGIN_URL . '?appid=' . $appId . '&response_type=code&scope=snsapi_login&state=STATE&redirect_uri=' . $redirectUrl;
    }

    /**
     * 构造跳转的链接登录页面（钉钉内免登第三方网站）
     * @param $appId
     * @param $redirectUrl
     * @return string
     */
    public function createAuthorizeLoginUrl($appId, $redirectUrl)
    {
        return $this->baseUrl . Router::CREATE_OAUTH2_LOGIN_URL . '?appid=' . $appId . '&response_type=code&scope=snsapi_auth&state=STATE&redirect_uri=' . $redirectUrl;
    }

    /**
     * 服务端通过临时授权码获取授权用户的个人信息
     * @param $tmpCode
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserInfoByTmpCode($tmpCode)
    {
        try {
            $this->options['form_params'] = [
                'tmp_auth_code' => $tmpCode
            ];
            $response = $this->client->request('POST', Router::GET_USER_INFO_BYCODE_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}