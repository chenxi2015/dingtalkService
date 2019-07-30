<?php
/**
 * 智能人事
 */

namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class HrmEmployee extends Base
{
    /**
     * 获取员工花名册字段信息
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHrmEmployeeList($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'userid_list'       => $data['userid_list'],
                'field_filter_list' => isset($data['field_filter_list']) ? $data['field_filter_list'] : '',
            ];
            $response = $this->client->request('POST', Router::GET_EMPLOYEE_FIELD_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询企业待入职员工列表
     * @param $accessToken
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getQuerypreentryEmployeeList($accessToken, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'offset' => $offset,
                'size' => $size,
            ];
            $response = $this->client->request('POST', Router::GET_EMPLOYEE_FIELD_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询企业在职员工列表
     * @param $accessToken
     * @param $statusList
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getQueryonjobEmployeeList($accessToken, $statusList, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'status_list' => $statusList,
                'offset'      => $offset,
                'size'        => $size,
            ];
            $response = $this->client->request('POST', Router::GET_EMPLOYEE_QUERYONJOB_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询企业离职员工列表
     * @param $accessToken
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getQuerydimissionEmployeeList($accessToken, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'offset' => $offset,
                'size'   => $size,
            ];
            $response = $this->client->request('POST', Router::GET_EMPLOYEE_QUERY_DISMISSION_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取离职员工离职信息
     * @param $accessToken
     * @param $useridList
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getListdimissionEmployeeList($accessToken, $useridList)
    {
        try {
            $this->options['form_params'] = [
                'userid_list' => $useridList
            ];
            $response = $this->client->request('POST', Router::GET_EMPLOYEE_QUERY_DISMISSION_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 添加企业待入职员工
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAddpreentryEmployeeList($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                "param" => [
                    'name'              => $data['name'],
                    'mobile'            => $data['mobile'],
                    'pre_entry_time'    => isset($data['pre_entry_time']) ? $data['pre_entry_time'] : '',
                    'op_userid'         => isset($data['op_userid']) ? $data['op_userid'] : '',
                    'extend_info'       => isset($data['extend_info']) ? $data['extend_info'] : '',
                ]
            ];
            $response = $this->client->request('POST', Router::GET_EMPLOYEE_ADDPREENTRY_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}