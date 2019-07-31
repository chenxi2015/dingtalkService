<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\Application;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    private $application;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->application = new Application();
    }

    public function testCanGetMicroAppList()
    {
        $response = $this->application->getMicroAppList('4a8d3d8d18eb3c509f60ed9d6ea676fd');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetMicroAppListByUid()
    {
        $response = $this->application->getMicroAppListByUid('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetMicroAppVisibleScopes()
    {
        $response = $this->application->getMicroAppVisibleScopes('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanSetMicroAppVisibleScopes()
    {
        $response = $this->application->setMicroAppVisibleScopes('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'agentId' => 1,
            'isHidden' => false,
            'deptVisibleScopes' => '{}',
            'userVisibleScopes' => '{}'
        ]);
        $this->assertJson($response);
    }

}