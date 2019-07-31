<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\Department;
use PHPUnit\Framework\TestCase;

class DepartmentTest extends TestCase
{
    private $department;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->department = new Department();
    }

    public function testCanCreateDepart()
    {
        $response = $this->department->createDepart('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'name' => 'gxheart',
            'parentid' => 1
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanUpdateDepart()
    {
        $response = $this->department->updateDepart('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'id' => 1,
            'name' => 'gxheart'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanDeleteDepart()
    {
        $response = $this->department->deleteDepart('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetChildDepartList()
    {
        $response = $this->department->getChildDepartList('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetDepartList()
    {
        $response = $this->department->getDepartList('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'id' => 1
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetDepartInfo()
    {
        $response = $this->department->getDepartInfo('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetDepartParentIds()
    {
        $response = $this->department->getDepartParentIds('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserDepartParentIds()
    {
        $response = $this->department->getUserDepartParentIds('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

}