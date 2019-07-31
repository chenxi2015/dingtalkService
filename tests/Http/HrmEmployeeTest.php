<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\HrmEmployee;
use PHPUnit\Framework\TestCase;

class HrmEmployeeTest extends TestCase
{
    public $hrmemployee;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->hrmemployee = new HrmEmployee();
    }

    public function testCanGetHrmEmployeeList()
    {
        $response = $this->hrmemployee->getHrmEmployeeList('2a3380e57b6738069bf3ae67c9140078', [
            'userid_list' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetQuerypreentryEmployeeList()
    {
        $response = $this->hrmemployee->getQuerypreentryEmployeeList('2a3380e57b6738069bf3ae67c9140078');
        $this->assertJson($response);
    }

    public function testCanGetQueryonjobEmployeeList()
    {
        $response = $this->hrmemployee->getQueryonjobEmployeeList('2a3380e57b6738069bf3ae67c9140078', '2');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetQuerydimissionEmployeeList()
    {
        $response = $this->hrmemployee->getQuerydimissionEmployeeList('2a3380e57b6738069bf3ae67c9140078');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetListdimissionEmployeeList()
    {
        $response = $this->hrmemployee->getListdimissionEmployeeList('2a3380e57b6738069bf3ae67c9140078', '1');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetAddpreentryEmployeeList()
    {
        $response = $this->hrmemployee->getAddpreentryEmployeeList('2a3380e57b6738069bf3ae67c9140078', [
            'name' => 'gxheart',
            'mobile' => '12345678901'
        ]);
        // echo $response;
        $this->assertJson($response);
    }
}
