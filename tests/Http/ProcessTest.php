<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\Process;
use PHPUnit\Framework\TestCase;

class ProcessTest extends TestCase
{
    private $process;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->process = new Process();
    }

    public function testCanCreateProcessIns()
    {
        $response = $this->process->createProcessIns('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_code' => '1',
            'originator_user_id' => '1',
            'dept_id' => '1',
            'name' => '1',
            'value' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetMultiProcessInsIdsList()
    {
        $response = $this->process->getMultiProcessInsIdsList('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_code' => '1',
            'start_time' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetProcessInsInfo()
    {
        $response = $this->process->getProcessInsInfo('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserWaitingTodoNum()
    {
        $response = $this->process->getUserWaitingTodoNum('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetUserSeenProcessTempByUid()
    {
        $response = $this->process->getUserSeenProcessTempByUid('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetProcessCspaceInfo()
    {
        $response = $this->process->getProcessCspaceInfo('7ca5a5e479b03f96a0fa4b4b6b420d67', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanSaveProcessTemp()
    {
        $response = $this->process->saveProcessTemp('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'name' => 'gxheart',
            'description' => 'gxheart',
            'form_component_list' => '1',
            'fake_mode' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanDeleteProcessTemp()
    {
        $response = $this->process->deleteProcessTemp('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_code' => 'gxheart',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCreateUpcomingProcessIns()
    {
        $response = $this->process->createUpcomingProcessIns('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_code' => 'gxheart',
            'originator_user_id' => '1',
            'form_component_values' => '1',
            'url' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanUpdateProcessIns()
    {
        $response = $this->process->updateProcessIns('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_instance_id' => '1',
            'status' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCreateWaitingProcessTask()
    {
        $response = $this->process->createWaitingProcessTask('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_instance_id' => '1',
            'tasks' => '1',
            'userid' => '1',
            'url' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanUpdateTaskStatus()
    {
        $response = $this->process->updateTaskStatus('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_instance_id' => '1',
            'tasks' => '1',
            'task_id' => '1',
            'status' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCancelMultiTask()
    {
        $response = $this->process->cancelMultiTask('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'process_instance_id' => '1',
            'activity_id' => '1',
        ]);
        // echo $response;
        $this->assertJson($response);
    }
}