<?php


namespace Gxheart\Tests;


use Gxheart\Http\Oauth;
use PHPUnit\Framework\TestCase;

class OauthTest extends TestCase
{
    public $oauth;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->oauth = new Oauth();
    }

    public function testCreateAuthorizeLoginUrl()
    {
        $response = $this->oauth->createAuthorizeLoginUrl('dingoaxa4fumrexmgc8os8', 'http://www.yuanjudongli.com/callback');
        $this->assertStringContainsString('https://oapi.dingtalk.com/connect/oauth2/sns_authorize', $response);
    }

    public function testCreateQrCodeLoginUrl()
    {
        $response = $this->oauth->createQrCodeLoginUrl('dingoaxa4fumrexmgc8os8', 'http://www.yuanjudongli.com/callback');
        $this->assertIsString($response);
    }

    public function testGetUserInfoByTmpCode()
    {
        $response = $this->oauth->getUserInfoByTmpCode('02b463a2b3943d0b98d3e9f1e58ccf0f');
        $this->assertJson($response);
    }
}