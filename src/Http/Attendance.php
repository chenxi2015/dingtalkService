<?php


namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Attendance extends Base
{
    /**
     * 企业考勤排班详情
     * @param $accessToken
     * @param $workDate
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAttendanceScheduleList($accessToken, $workDate, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'workDate' => $workDate,
                'offset'   => $offset,
                'size'     => $size,
            ];
            $response = $this->client->request('POST', Router::GET_ATTENDANCE_SCHEDULE_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 企业考勤组详情
     * @param $accessToken
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAttendanceSimpleGroupsInfo($accessToken, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'offset'   => $offset,
                'size'     => $size,
            ];
            $response = $this->client->request('POST', Router::GET_ATTENDANCE_SIMPLE_GROUP_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取打卡详情
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAttendanceListRecord($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'userIds'       => $data['userIds'],
                'checkDateFrom' => $data['checkDateFrom'],
                'checkDateTo'   => $data['checkDateTo'],
                'isI18n'        => isset($data['isI18n']) ? $data['isI18n'] : '',
            ];
            $response = $this->client->request('POST', Router::GET_ATTENDANCE_RECORD_INFO_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取打卡结果
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAttendanceResultList($accessToken, $data, $offset = 0, $limit = 10)
    {
        try {
            $this->options['form_params'] = [
                'workDateFrom'  => $data['workDateFrom'],
                'workDateTo'    => $data['workDateTo'],
                'userIdList'    => $data['userIdList'],
                'offset'        => $offset,
                'limit'         => $limit,
                'isI18n'        => isset($data['isI18n']) ? $data['isI18n'] : '',
            ];
            $response = $this->client->request('POST', Router::GET_ATTENDANCE_RECORD_RESULT_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取请假时长
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLeaveApproveDuration($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'userid'    => $data['userid'],
                'from_date' => $data['from_date'],
                'to_date'   => $data['to_date'],
            ];
            $response = $this->client->request('POST', Router::GET_ATTENDANCE_LEAVE_DURATION_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询请假状态
     * @param $accessToken
     * @param $data
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLeaveStatus($accessToken, $data, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'userid_list' => $data['userid_list'],
                'start_time'  => $data['start_time'],
                'end_time'    => $data['end_time'],
                'offset'      => $offset,
                'size'        => $size,
            ];
            $response = $this->client->request('POST', Router::GET_ATTENDANCE_LEAVE_STATUS_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户考勤组
     * @param $accessToken
     * @param $userId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserGroup($accessToken, $userId)
    {
        try {
            $this->options['form_params'] = [
                'userid' => $userId,
            ];
            $response = $this->client->request('POST', Router::GET_ATTENDANCE_USER_GROUP_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * DING日程
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createDingCalendar($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'create_vo' => [
                    'summary'            => $data['summary'],
                    'reminder'           => isset($data['reminder']) ? $data['reminder'] : '',
                    'minutes' => [
                        'remind_type'    => isset($data['minutes']) ? $data['minutes'] : '',
                    ],
                    'location'           => isset($data['location']) ? $data['location'] : '',
                    'receiver_userids'   => $data['receiver_userids'],
                    'end_time' => [
                        'unix_timestamp' => $data['end_unix_timestamp'],
                        'timezone'       => isset($data['end_timezone']) ? $data['end_timezone'] : '',
                    ],
                    'calendar_type'      => $data['calendar_type'],
                    'start_time' => [
                        'unix_timestamp' => $data['start_unix_timestamp'],
                        'timezone'       => isset($data['start_timezone']) ? $data['start_timezone'] : '',
                    ],
                    'source' => [
                        'title'          => isset($data['title']) ? $data['title'] : '',
                        'url'            => $data['url'],
                    ],
                    'description'        => isset($data['description']) ? $data['description'] : '',
                    'creator_userid'     => $data['creator_userid'],
                    'uuid'               => $data['uuid'],
                    'biz_id'             => $data['biz_id'],
                ],
            ];
            $response = $this->client->request('POST', Router::CREATE_DING_CALENDAR_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取部门用户签到记录
     * @param $accessToken
     * @param $data
     * @param int $offset
     * @param int $size
     * @param string $order
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepartUserCheckInRecord($accessToken, $data, $offset = 0, $size = 10, $order = 'asc')
    {
        try {
            $this->options['query'] = [
                'department_id' => $data['department_id'],
                'start_time'    => $data['start_time'],
                'end_time'      => $data['end_time'],
                'offset'        => $offset,
                'size'          => $size,
                'order'         => $order,
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_USER_CHECKIN_RECORD_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户签到记录
     * @param $accessToken
     * @param $data
     * @param int $cursor
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserCheckInRecord($accessToken, $data, $cursor = 0, $size = 10)
    {
        try {
            $this->options['form_params'] = [
                'userid_list'   => $data['userid_list'],
                'start_time'    => $data['start_time'],
                'end_time'      => $data['end_time'],
                'cursor'        => $cursor,
                'size'          => $size,
            ];
            $response = $this->client->request('POST', Router::GET_USER_CHECKIN_RECORD_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户公告数据
     * @param $accessToken
     * @param $userId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserBlackBoardList($accessToken, $userId)
    {
        try {
            $this->options['form_params'] = [
                'userid' => $userId,
            ];
            $response = $this->client->request('POST', Router::GET_USER_BLACKBOARD_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}