<?php
/**
 * 群机器人
 */

namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Robot extends Base
{
    /**
     * 自定义机器人
     * @param $accessToken
     * @param array $data
     * @param string $msgtype
     * @return array|bool|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRobotMsg($accessToken, $data = [], $msgtype = 'text')
    {
        try {
            if (!in_array($msgtype, ['text', 'link', 'markdown', 'actionCard', 'feedCard'])) {
                return false;
            }
            $dataArr['msgtype'] = $msgtype;
            switch ($msgtype) {
                case 'text':
                    $dataArr['text']['content']     = $data['content'];
                    $dataArr['at']['atMobiles']     = isset($data['atMobiles']) ? $data['atMobiles'] : [];
                    $dataArr['at']['isAtAll']       = isset($data['isAtAll']) ? $data['isAtAll'] : true;
                    break;

                case 'link':
                    $dataArr['link']['text']        = $data['text'];
                    $dataArr['link']['title']       = $data['title'];
                    $dataArr['link']['messageUrl']  = $data['messageUrl'];
                    $dataArr['link']['picUrl']      = isset($data['picUrl']) ? $data['picUrl'] : '';
                    break;

                case 'markdown':
                    $dataArr['markdown']['title']   = $data['title'];
                    $dataArr["markdown"]['text']    = $data['text'];
                    $dataArr["at"]['atMobiles']     = isset($data['atMobiles']) ? $data['atMobiles'] : [];
                    $dataArr["at"]['isAtAll']       = isset($data['isAtAll']) ? $data['isAtAll'] : true;
                    break;

                case 'actionCard':
                    $dataArr['actionCard']['title']          = $data['title'];
                    $dataArr['actionCard']['text']           = $data['text'];
                    $dataArr['actionCard']['singleTitle']    = isset($data['singleTitle']) ? $data['singleTitle'] : ''; // 单个按钮的方案。(设置此项和singleURL后btns无效)
                    $dataArr['actionCard']['singleURL']      = isset($data['singleURL']) ? $data['singleURL'] : '';
                    $dataArr['actionCard']['btns']           = isset($data['btns']) ? $data['btns'] : [];
                    $dataArr['actionCard']['btnOrientation'] = isset($data['btnOrientation']) ? $data['btnOrientation'] : 0;
                    $dataArr['actionCard']['hideAvatar']     = isset($data['hideAvatar']) ? $data['hideAvatar'] : 0;
                    break;

                case 'feedCard':
                    $dataArr['feedCard']['links'] = $data['links'];
                    break;

            }
            $this->options['body'] = json_encode($dataArr);
            $response = $this->client->request('POST', Router::GET_ROBOT_SEND_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}