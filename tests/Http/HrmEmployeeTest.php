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

    public function testCanGetQuerypreentryEmployeeList()
    {
        $response = $this->hrmemployee->getQuerypreentryEmployeeList('2a3380e57b6738069bf3ae67c9140078');
        $this->assertJson($response);
    }
}