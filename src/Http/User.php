<?php
/**
 * 用户
 */

namespace Gxheart\Http;


use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class User extends Base
{
    /**
     * 创建用户
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createUserInfo($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'userid'        => isset($data['userid']) ? $data['userid'] : '',
                'name'          => isset($data['name']) ? $data['name'] : '',
                'orderInDepts'  => isset($data['orderInDepts']) ? $data['orderInDepts'] : '',
                'department'    => isset($data['department']) ? $data['department'] : '',
                'position'      => isset($data['position']) ? $data['department'] : '',
                'mobile'        => isset($data['mobile']) ? $data['mobile'] : '',
                'tel'           => isset($data['tel']) ? $data['mobile'] : '',
                'workPlace'     => isset($data['workPlace']) ? $data['workPlace'] : '',
                'remark'        => isset($data['remark']) ? $data['remark'] : '',
                'email'         => isset($data['email']) ? $data['email'] : '',
                'orgEmail'      => isset($data['orgEmail']) ? $data['orgEmail'] : '',
                'jobnumber'     => isset($data['jobnumber']) ? $data['jobnumber'] : '',
                'isHide'        => isset($data['isHide']) ? $data['isHide'] : '',
                'isSenior'      => isset($data['isSenior']) ? $data['isSenior'] : '',
                'extattr'       => isset($data['extattr']) ? $data['extattr'] : '',
                'hiredDate'     => isset($data['hiredDate']) ? $data['hiredDate'] : ''
            ];
            $response = $this->client->request('POST', Router::CREATE_USER_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 更新用户
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateUserInfo($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'userid'        => isset($data['userid']) ? $data['userid'] : '',
                'name'          => isset($data['name']) ? $data['name'] : '',
                'orderInDepts'  => isset($data['orderInDepts']) ? $data['orderInDepts'] : '',
                'department'    => isset($data['department']) ? $data['department'] : '',
                'position'      => isset($data['position']) ? $data['department'] : '',
                'mobile'        => isset($data['mobile']) ? $data['mobile'] : '',
                'tel'           => isset($data['tel']) ? $data['tel'] : '',
                'workPlace'     => isset($data['workPlace']) ? $data['workPlace'] : '',
                'remark'        => isset($data['remark']) ? $data['remark'] : '',
                'email'         => isset($data['email']) ? $data['email'] : '',
                'orgEmail'      => isset($data['orgEmail']) ? $data['orgEmail'] : '',
                'jobnumber'     => isset($data['jobnumber']) ? $data['jobnumber'] : '',
                'isHide'        => isset($data['isHide']) ? $data['isHide'] : '',
                'isSenior'      => isset($data['isSenior']) ? $data['isSenior'] : '',
                'extattr'       => isset($data['extattr']) ? $data['extattr'] : '',
                'hiredDate'     => isset($data['hiredDate']) ? $data['hiredDate'] : ''
            ];
            $response = $this->client->request('POST', Router::UPDATE_USER_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 删除用户
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteUserInfo($accessToken, $userId)
    {
        try {
            $this->options['query'] = [
                'userid' => $userId,
                'access_token' => $accessToken
            ];
            $response = $this->client->request('GET', Router::DELETE_USER_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取用户信息
     * @param $accessToken
     * @param $userId
     * @param string $lang
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserInfo($accessToken, $userId, $lang = 'zh_CN')
    {
        try {
            $this->options['query'] = [
                'userid' => $userId,
                'access_token' => $accessToken,
                'lang' => $lang
            ];
            $response = $this->client->request('GET', Router::GET_USER_INFO_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取部门用户userid列表
     * @param $accessToken
     * @param $deptId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepartUserIdList($accessToken, $deptId)
    {
        try {
            $this->options['query'] = [
                'access_token' => $accessToken,
                'deptId' => $deptId
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_USERID_LIST_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取部门用户列表
     * @param $accessToken
     * @param $deptId
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepartSimpleUserList($accessToken, $deptId, $offset=0, $size = 10, $order = 'custom', $lang = 'zh_CN')
    {
        try {
            $this->options['query'] = [
                'access_token'  => $accessToken,
                'department_id' => $deptId,
                'offset'        => $offset,
                'size'          => $size,
                'order'         => $order,
                'lang'          => $lang,
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_USER_SIMPLE_LIST_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取部门用户详情
     * @param $accessToken
     * @param $deptId
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepartUserList($accessToken, $deptId, $offset=0, $size = 10, $order = 'custom', $lang = 'zh_CN')
    {
        try {
            $this->options['query'] = [
                'access_token'  => $accessToken,
                'department_id' => $deptId,
                'offset'        => $offset,
                'size'          => $size,
                'order'         => $order,
                'lang'          => $lang,
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_USER_LIST_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取管理员列表
     * @param $accessToken
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAdminList($accessToken)
    {
        try {
            $this->options['query'] = [
                'access_token'  => $accessToken,
            ];
            $response = $this->client->request('GET', Router::GET_ADMIN_LIST_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取管理员通讯录权限范围
     * @param $accessToken
     * @param $userId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAdminScope($accessToken, $userId)
    {
        try {
            $this->options['query'] = [
                'access_token'  => $accessToken,
                'userid'        => $userId,
            ];
            $response = $this->client->request('GET', Router::GET_ADMIN_SCOPE_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 根据unionid获取userid
     * @param $accessToken
     * @param $unionid
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserIdByUnionId($accessToken, $unionid)
    {
        try {
            $this->options['query'] = [
                'access_token' => $accessToken,
                'unionid'      => $unionid,
            ];
            $response = $this->client->request('GET', Router::GET_USEID_BYUNIONID_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取企业员工人数
     * @param $accessToken
     * @param $onlyActive
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOrgUserCount($accessToken, $onlyActive)
    {
        try {
            $this->options['query'] = [
                'access_token' => $accessToken,
                'onlyActive'   => $onlyActive,
            ];
            $response = $this->client->request('GET', Router::GET_ORG_USER_COUNT_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}