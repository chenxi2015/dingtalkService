<?php

namespace Gxheart\Tests;

use Gxheart\Http\AccessToken;
use PHPUnit\Framework\TestCase;

class AccessTokenTest extends TestCase
{
    /**
     * @var AccessToken
     */
    public $accessToken;

    /**
     * AccessTokenTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->accessToken = new AccessToken();
    }

    /**
     * 获取access token
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetAccessToken()
    {
        $response = $this->accessToken->getAccessToken('dingvintpvmfu8rrelcp', 'VebpA9AyFMYid1uynI_KZ8PISpUa1Dz_lLMNuliAc68ijpxVlXT-0FCO2i9T8pPc');
        // echo $response;
        $this->assertJson($response);
    }


}