<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\Report;
use PHPUnit\Framework\TestCase;

class ReportTest extends TestCase
{
    private $report;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->report = new Report();
    }

    public function testCanGetUserReportList()
    {
        $response = $this->report->getUserReportList('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'start_time' => '1',
            'end_time' => '1',
            'cursor' => '1',
            'size' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetReportStatisticsList()
    {
        $response = $this->report->getReportStatisticsList('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'report_id' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetReportStatisticsUserList()
    {
        $response = $this->report->getReportStatisticsUserList('7ca5a5e479b03f96a0fa4b4b6b420d67', 1, 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetReportReceiverList()
    {
        $response = $this->report->getReportReceiverList('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetReportCommentList()
    {
        $response = $this->report->getReportCommentList('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUnreadReportCount()
    {
        $response = $this->report->getUnreadReportCount('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserReportTemplateList()
    {
        $response = $this->report->getUserReportTemplateList('7ca5a5e479b03f96a0fa4b4b6b420d67');
        // echo $response;
        $this->assertJson($response);
    }

}