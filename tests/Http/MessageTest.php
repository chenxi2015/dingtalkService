<?php


namespace Gxheart\Tests\Http;


use Gxheart\Http\Message;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    public $message;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->message = new Message();
    }

    public function testCanSendWorkNotice()
    {
        $response = $this->message->sendWorkNotice('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'agent_id' => 1,
            'msg' => '12312'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetWorkNoticeSendProgress()
    {
        $response = $this->message->getWorkNoticeSendProgress('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'agent_id' => 1,
            'task_id' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanGetWorkNoticeSendResult()
    {
        $response = $this->message->getWorkNoticeSendResult('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'agent_id' => 1,
            'task_id' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanRecallWorkNotice()
    {
        $response = $this->message->recallWorkNotice('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'agent_id' => 1,
            'msg_task_id' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanSendChatMsg()
    {
        $response = $this->message->sendChatMsg('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'chatid' => 1,
            'msg' => '{"msgtype": "text", "text": {"content": "张三的请假申请"}}'
        ]);
        $this->assertJson($response);
    }

    public function testCanGetChatReadList()
    {
        $response = $this->message->getChatReadList('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'messageId' => 1,
            'cursor' => 0,
            'size' => 10
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanCreateChat()
    {
        $response = $this->message->createChat('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'name' => 1,
            'owner' => 0,
            'useridlist' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testCanUpdateChat()
    {
        $response = $this->message->updateChat('4a8d3d8d18eb3c509f60ed9d6ea676fd', [
            'chatid' => 1,
            'name' => 'gxheart',
        ]);
        // echo $response;
        $this->assertJson($response);
    }

    public function testGetChatInfo()
    {
        $response = $this->message->getChatInfo('4a8d3d8d18eb3c509f60ed9d6ea676fd', 1);
        // echo $response;
        $this->assertJson($response);
    }

    public function testSendNormalMsg()
    {
        $response = $this->message->sendNormalMsg('7ca5a5e479b03f96a0fa4b4b6b420d67', [
            'content' => 'gxheart',
            'sender' => '1',
            'cid' => '1'
        ]);
        // echo $response;
        $this->assertJson($response);
    }



}