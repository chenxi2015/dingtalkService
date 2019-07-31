<?php
/**
 * 消息通知
 */

namespace Gxheart\Http;

use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Message extends Base
{

    /**
     * 发送工作通知消息
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendWorkNotice($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'agent_id'      => $data['agent_id'],
                'userid_list'   => isset($data['userid_list']) ? $data['userid_list'] : '',
                'dept_id_list'  => isset($data['dept_id_list']) ? $data['dept_id_list'] : '',
                'to_all_user'   => isset($data['to_all_user']) ? $data['to_all_user'] : '',
                'msg'           => $data['msg']
            ];
            $response = $this->client->request('POST', Router::SEND_WORK_MSG_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询工作通知消息的发送进度
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWorkNoticeSendProgress($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'agent_id' => $data['agent_id'],
                'task_id'  => $data['task_id']
            ];
            $response = $this->client->request('POST', Router::GET_WORK_MSG_PROGRESS_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询工作通知消息的发送结果
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWorkNoticeSendResult($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'agent_id'  => isset($data['agent_id']) ? $data['agent_id'] : '',
                'task_id'   => isset($data['task_id']) ? $data['task_id'] : '',
            ];
            $response = $this->client->request('POST', Router::GET_WORK_MSG_RESULT_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 工作通知消息撤回
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function recallWorkNotice($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'agent_id'      => isset($data['agent_id']) ? $data['agent_id'] : '',
                'msg_task_id'   => isset($data['msg_task_id']) ? $data['msg_task_id'] : '',
            ];
            $response = $this->client->request('POST', Router::RECALL_WORK_MSG_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 发送群消息
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendChatMsg($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'chatid' => isset($data['chatid']) ? $data['chatid'] : '',
                'msg'    => isset($data['msg']) ? $data['msg'] : '',
            ];
            $response = $this->client->request('POST', Router::SEND_CHAT_MSG_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询群消息已读人员列表
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getChatReadList($accessToken, $data)
    {
        try {
            $this->options['query'] = [
                'access_token' => $accessToken,
                'messageId'    => $data['messageId'],
                'cursor'       => $data['cursor'],
                'size'         => $data['size']
            ];
            $response = $this->client->request('GET', Router::GET_CHAT_MSG_READ_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 创建会话
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createChat($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'name'                  => $data['name'],
                'owner'                 => $data['owner'],
                'useridlist'            => $data['useridlist'],
                'showHistoryType'       => isset($data['showHistoryType']) ? $data['showHistoryType'] : 0,
                'searchable'            => isset($data['searchable']) ? $data['searchable'] : 0,
                'validationType'        => isset($data['validationType']) ? $data['validationType'] : 0,
                'mentionAllAuthority'   => isset($data['mentionAllAuthority']) ? $data['mentionAllAuthority'] : 0,
                'chatBannedType'        => isset($data['chatBannedType']) ? $data['chatBannedType'] : 0,
                'managementType'        => isset($data['managementType']) ? $data['managementType'] : 0,
            ];
            $response = $this->client->request('POST', Router::CREATE_CHAT_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 修改会话
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateChat($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'chatid'                => $data['chatid'],
                'name'                  => isset($data['name']) ? $data['name'] : '',
                'owner'                 => isset($data['owner']) ? $data['owner'] : '',
                'add_useridlist'        => isset($data['add_useridlist']) ? $data['add_useridlist'] : '',
                'del_useridlist'        => isset($data['del_useridlist']) ? $data['del_useridlist'] : '',
                'icon'                  => isset($data['icon']) ? $data['icon'] : '',
                'chatBannedType'        => isset($data['chatBannedType']) ? $data['chatBannedType'] : 0,
                'searchable'            => isset($data['searchable']) ? $data['searchable'] : 0,
                'validationType'        => isset($data['validationType']) ? $data['validationType'] : 0,
                'mentionAllAuthority'   => isset($data['mentionAllAuthority']) ? $data['mentionAllAuthority'] : 0,
                'showHistoryType'       => isset($data['showHistoryType']) ? $data['showHistoryType'] : 0,
                'managementType'        => isset($data['managementType']) ? $data['managementType'] : 0,
            ];
            $response = $this->client->request('POST', Router::UPDATE_CHAT_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取会话
     * @param $accessToken
     * @param $chatId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getChatInfo($accessToken, $chatId)
    {
        try {
            $this->options['query'] = [
                'chatid'        => $chatId,
                'access_token'  => $accessToken
            ];
            $response = $this->client->request('GET', Router::GET_CHAT_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 发送普通消息
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendNormalMsg($accessToken, $data = [], $msgtype = 'text')
    {
        try {
            if (!in_array($msgtype, ['text', 'image', 'voice', 'file', 'link', 'oa', 'markdown', 'action_card'])) {
                return false;
            }
            $data['msg']['msgtype'] = $msgtype;

            switch ($msgtype) {
                case 'text':
                    $data['msg']['text']['content'] = $data['content'];
                    break;

                case 'image':
                    $data['msg']['image']['media_id'] = $data['media_id'];
                    break;

                case 'voice':
                    $data['msg']['voice']['media_id'] = $data['media_id'];
                    $data['msg']['voice']['duration'] = $data['duration'];
                    break;

                case 'file':
                    $data['msg']['file']['media_id'] = $data['media_id'];
                    break;

                case 'link':
                    $data['msg']['link']['messageUrl']  = $data['messageUrl'];
                    $data['msg']['link']['picUrl']      = $data['picUrl'];
                    $data['msg']['link']['title']       = $data['title'];
                    $data['msg']['link']['text']        = $data['text'];
                    break;

                case 'oa':
                    $data['msg']['oa']['message_url']           = $data['message_url'];
                    $data['msg']['oa']['pc_message_url']        = isset($data['pc_message_url']) ? $data['pc_message_url'] : '';
                    $data['msg']['oa']['head']['bgcolor']       = $data['bgcolor'];
                    $data['msg']['oa']['head']['text']          = $data['text'];
                    $data['msg']['oa']['body']['title']         = isset($data['title']) ? $data['title'] : '';
                    $data['msg']['oa']['body']['form']          = isset($data['form']) ? $data['form'] : [];
                    $data['msg']['oa']['body']['rich']['num']   = isset($data['num']) ? $data['num'] : '';
                    $data['msg']['oa']['body']['rich']['unit']  = isset($data['unit']) ? $data['unit'] : '';
                    $data['msg']['oa']['body']['content']       = isset($data['content']) ? $data['content'] : '';
                    $data['msg']['oa']['body']['image']         = isset($data['image']) ? $data['image'] : '';
                    $data['msg']['oa']['body']['file_count']    = isset($data['file_count']) ? $data['file_count'] : '';
                    $data['msg']['oa']['body']['author']        = isset($data['author']) ? $data['author'] : '';
                    break;

                case 'markdown':
                    $data['msg']['markdown']['title'] = $data['title'];
                    $data['msg']['markdown']['text']  = $data['text'];
                    break;

                case 'action_card':
                    $data['msg']['action_card']['title']            = $data['title'];
                    $data['msg']['action_card']['markdown']         = $data['markdown'];
                    $data['msg']['action_card']['single_title']     = isset($data['single_title']) ? $data['single_title'] : '';
                    $data['msg']['action_card']['single_url']       = isset($data['single_url']) ? $data['single_url'] : '';
                    $data['msg']['action_card']['btn_orientation']  = isset($data['btn_orientation']) ? $data['btn_orientation'] : '';
                    $data['msg']['action_card']['btn_json_list']    = isset($data['btn_json_list']) ? $data['btn_json_list'] : [];
                    break;
            }

            $msg = json_encode($data['msg']);

            $this->options['form_params'] = [
                'sender' => $data['sender'],
                'cid'    => $data['cid'],
                'msg'    => $msg
            ];
            $response = $this->client->request('POST', Router::SEND_NORMAL_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}