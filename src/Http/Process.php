<?php
/**
 * 审批代办
 */

namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Process extends Base
{
    /**
     * 发起审批
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createProcessIns($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'agent_id'              => isset($data['agent_id']) ? $data['agent_id'] : '',
                'process_code'          => $data['process_code'],
                'originator_user_id'    => $data['originator_user_id'],
                'dept_id'               => $data['dept_id'],
                'approvers'             => isset($data['approvers']) ? $data['approvers'] : '',
                'approvers_v2'          => isset($data['approvers_v2']) ? $data['approvers_v2'] : [],
                'cc_list'               => isset($data['cc_list']) ? $data['cc_list'] : '',
                'cc_position'           => isset($data['cc_position']) ? $data['cc_position'] : '',
                'form_component_values' => [
                    'name'      => $data['name'],
                    'value'     => $data['value'],
                    'ext_value' => isset($data['ext_value']) ? $data['ext_value'] : '',
                ],
            ];
            $response = $this->client->request('POST', Router::CREATE_PROCESSINS_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 批量获取审批实例id
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMultiProcessInsIdsList($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'process_code' => $data['process_code'],
                'start_time'   => $data['start_time'],
                'end_time'     => isset($data['end_time']) ? $data['end_time'] : '',
                'size'         => isset($data['size']) ? $data['size'] : 20,
                'cursor'       => isset($data['cursor']) ? $data['cursor'] : 0,
                'userid_list'  => isset($data['userid_list']) ? $data['userid_list'] : '',
            ];
            $response = $this->client->request('POST', Router::GET_PROCESSINS_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取审批实例详情
     * @param $accessToken
     * @param $processInstanceId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProcessInsInfo($accessToken, $processInstanceId)
    {
        try {
            $this->options['form_params'] = [
                'processInstanceId' => $processInstanceId
            ];
            $response = $this->client->request('POST', Router::GET_PROCESSINS_INFO_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户待审批数量
     * @param $accessToken
     * @param $userId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserWaitingTodoNum($accessToken, $userId)
    {
        try {
            $this->options['form_params'] = [
                'userid' => $userId
            ];
            $response = $this->client->request('POST', Router::GET_USER_TODO_NUM_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户可见的审批模板
     * @param $accessToken
     * @param $userId
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserSeenProcessTempByUid($accessToken, $userId, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'userid' => $userId,
                'offset' => $offset,
                'size' => $size,
            ];
            $response = $this->client->request('POST', Router::GET_USER_LIST_BY_UID_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取审批钉盘空间信息
     * @param $accessToken
     * @param $userId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProcessCspaceInfo($accessToken, $userId)
    {
        try {
            $this->options['form_params'] = [
                'userid' => $userId
            ];
            $response = $this->client->request('POST', Router::GET_PROCESS_CSPACE_INFO_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 创建或更新待办模板
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function saveProcessTemp($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'saveProcessRequest' => [
                    'agentid'               => isset($data['agentid']) ? $data['agentid'] : '',
                    'process_code'          => isset($data['process_code']) ? $data['process_code'] : '',
                    'name'                  => $data['name'],
                    'description'           => $data['description'],
                    'form_component_list'   => $data['form_component_list'],
                    'fake_mode'             => $data['fake_mode'],
                ]
            ];
            $response = $this->client->request('POST', Router::SAVE_PROCESS_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 删除待办模板
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteProcessTemp($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'request' => [
                    'agentid' => isset($data['agentid']) ? $data['agentid'] : '',
                    'process_code' => $data['process_code']
                ]
            ];
            $response = $this->client->request('POST', Router::DELETE_PROCESS_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 创建待办实例
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createUpcomingProcessIns($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'request' => [
                    'agentid'               => isset($data['agentid']) ? $data['agentid'] : '',
                    'process_code'          => $data['process_code'],
                    'originator_user_id'    => $data['originator_user_id'],
                    'title'                 => isset($data['title']) ? $data['title'] : '',
                    'form_component_values' => $data['form_component_values'],
                    'url'                   => $data['url']
                ]
            ];
            $response = $this->client->request('POST', Router::CREATE_PROCESS_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}