<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\Role;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    private $role;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->role = new Role();
    }

    public function testCanGetRoleList()
    {
        $response = $this->role->getRoleList('7ca5a5e479b03f96a0fa4b4b6b420d67');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserSimpleListByRole()
    {
        $response = $this->role->getUserSimpleListByRole('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetRoleGroupsList()
    {
        $response = $this->role->getRoleGroupsList('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetRoleInfo()
    {
        $response = $this->role->getRoleInfo('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCreateRole()
    {
        $response = $this->role->createRole('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'groupId' => '1',
            'roleName' => 'gxheart'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanUpdateRole()
    {
        $response = $this->role->updateRole('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'roleId' => '1',
            'roleName' => 'gxheart'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanDeleteRole()
    {
        $response = $this->role->deleteRole('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCreateRoleGroup()
    {
        $response = $this->role->createRoleGroup('7ca5a5e479b03f96a0fa4b4b6b420d67', 'gxheart');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCreateMultiRoles()
    {
        $response = $this->role->createMultiRoles('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'roleIds' => '1,2',
            'userIds' => '1,2'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanDeleteMultiRoles()
    {
        $response = $this->role->deleteMultiRoles('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'roleIds' => '1,2',
            'userIds' => '1,2'
        ]);
        // echo $response;
        $this->assertJson($response);
    }
}