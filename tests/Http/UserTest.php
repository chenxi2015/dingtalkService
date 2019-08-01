<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->user = new User();
    }

    public function testCanCreateUserInfo()
    {
        $response = $this->user->createUserInfo('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'name' => 'gxheart',
            'department' => 'department',
            'mobile' => '12345678901'
        ]);
        // // echo $response;
        $this->assertJson($response);
    }

    public function testCanUpdateUserInfo()
    {
        $response = $this->user->updateUserInfo('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'userid' => '1',
            'name' => 'gxheart',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanDeleteUserInfo()
    {
        $response = $this->user->deleteUserInfo('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserInfo()
    {
        $response = $this->user->getUserInfo('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetDepartUserIdList()
    {
        $response = $this->user->getDepartUserIdList('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetDepartSimpleUserList()
    {
        $response = $this->user->getDepartSimpleUserList('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetDepartUserList()
    {
        $response = $this->user->getDepartUserList('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetAdminList()
    {
        $response = $this->user->getAdminList('7ca5a5e479b03f96a0fa4b4b6b420d67');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetAdminScope()
    {
        $response = $this->user->getAdminScope('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserIdByUnionId()
    {
        $response = $this->user->getUserIdByUnionId('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetOrgUserCount()
    {
        $response = $this->user->getOrgUserCount('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

}