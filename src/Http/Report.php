<?php


namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Report extends Base
{
    /**
     * 获取用户日志数据
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserReportList($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'start_time'    => $data['start_time'],
                'end_time'      => $data['end_time'],
                'template_name' => isset($data['template_name']) ? $data['template_name'] : '',
                'userid'        => isset($data['userid']) ? $data['userid'] : '',
                'extend_info'   => isset($data['extend_info']) ? $data['extend_info'] : '',
                'cursor'        => $data['cursor'],
                'size'          => $data['size'],
            ];
            $response = $this->client->request('POST', Router::GET_USER_REPORT_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取日志统计数据
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getReportStatisticsList($accessToken, $reportId)
    {
        try {
            $this->options['form_params'] = [
                'report_id' => $reportId
            ];
            $response = $this->client->request('POST', Router::GET_REPORT_STATISTICS_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取日志相关人员列表
     * @param $accessToken
     * @param $reportId
     * @param $type
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getReportStatisticsUserList($accessToken, $reportId, $type, $offset = 0, $size = 10)
    {
        try {
            $this->options['form_params'] = [
                'report_id' => $reportId,
                'type'      => $type,
                'offset'    => $offset,
                'size'      => $size
            ];
            $response = $this->client->request('POST', Router::GET_REPORT_STATISTICS_USER_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取日志接收人员列表
     * @param $accessToken
     * @param $reportId
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getReportReceiverList($accessToken, $reportId, $offset = 0, $size = 10)
    {
        try {
            $this->options['form_params'] = [
                'report_id' => $reportId,
                'offset'    => $offset,
                'size'      => $size
            ];
            $response = $this->client->request('POST', Router::GET_REPORT_RECEIVER_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取日志评论详情
     * @param $accessToken
     * @param $reportId
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getReportCommentList($accessToken, $reportId, $offset = 0, $size = 10)
    {
        try {
            $this->options['form_params'] = [
                'report_id' => $reportId,
                'offset'    => $offset,
                'size'      => $size
            ];
            $response = $this->client->request('POST', Router::GET_REPORT_COMMENT_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户日志未读数
     * @param $accessToken
     * @param $userId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUnreadReportCount($accessToken, $userId)
    {
        try {
            $this->options['form_params'] = [
                'userid' => $userId
            ];
            $response = $this->client->request('POST', Router::GET_REPORT_UNREAD_COUNT_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户可见的日志模板
     * @param $accessToken
     * @param string $userId
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserReportTemplateList($accessToken, $userId = '', $offset = 0, $size = 10)
    {
        try {
            $this->options['form_params'] = [
                'userid' => $userId,
                'offset' => $offset,
                'size'   => $size,
            ];
            $response = $this->client->request('POST', Router::GET_USER_REPORT_TEMP_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}