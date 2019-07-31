<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\Attendance;
use PHPUnit\Framework\TestCase;

class AttendanceTest extends TestCase
{
    private $attendance;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->attendance = new Attendance();
    }

    public function testCanGetAttendanceScheduleList()
    {
        $response = $this->attendance->getAttendanceScheduleList('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetAttendanceSimpleGroupsInfo()
    {
        $response = $this->attendance->getAttendanceSimpleGroupsInfo('4a8d3d8d18eb3c509f60ed9d6ea676fd');
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetAttendanceListRecord()
    {
        $response = $this->attendance->getAttendanceListRecord('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'userIds' => '1',
            'checkDateFrom' => '1',
            'checkDateTo' => '1',
            'isI18n' => ''
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetAttendanceResultList()
    {
        $response = $this->attendance->getAttendanceResultList('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'workDateFrom' => '1',
            'workDateTo' => '1',
            'userIdList' => '1',
            'isI18n' => '',
        ], 0, 10);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetLeaveApproveDuration()
    {
        $response = $this->attendance->getLeaveApproveDuration('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'userid' => '1',
            'from_date' => '1',
            'to_date' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetLeaveStatus()
    {
        $response = $this->attendance->getLeaveStatus('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'userid_list' => '1',
            'end_time' => '1',
            'start_time' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserGroup()
    {
        $response = $this->attendance->getUserGroup('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCreateDingCalendar()
    {
        $response = $this->attendance->createDingCalendar('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'summary' => '1',
            'receiver_userids' => '1',
            'end_unix_timestamp' => '1',
            'calendar_type' => '1',
            'start_unix_timestamp' => '',
            'url' => '',
            'creator_userid' => '1',
            'uuid' => '1',
            'biz_id' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetDepartUserCheckInRecord()
    {
        $response = $this->attendance->getDepartUserCheckInRecord('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'department_id' => '1',
            'start_time' => '1',
            'end_time' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserCheckInRecord()
    {
        $response = $this->attendance->getUserCheckInRecord('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'userid_list' => '1',
            'start_time' => '1',
            'end_time' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserBlackBoardList()
    {
        $response = $this->attendance->getUserBlackBoardList('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }
}