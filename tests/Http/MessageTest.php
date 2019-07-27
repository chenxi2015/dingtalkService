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

    public function testCanSendChatMsg()
    {
        $response = $this->message->sendChatMsg('216b872d4b0f3ac990d41dac958f81d8', [
            'chatid' => 1,
            'msg' => '{"msgtype": "text", "text": {"content": "张三的请假申请"}}'
        ]);
        $this->assertJson($response);
    }
}