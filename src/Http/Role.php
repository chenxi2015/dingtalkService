<?php


namespace Gxheart\Http;

use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Role extends Base
{
    /**
     * 获取角色列表
     * @param $accessToken
     * @param int $offset
     * @param int $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRoleList($accessToken, $offset = 0, $size = 20)
    {
        try {
            $this->options['form_params'] = [
                'offset' => $offset,
                'size' => $size,
            ];
            $response = $this->client->request('POST', Router::GET_ROLE_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取角色下的员工列表
     * @param $accessToken
     * @param $roleId
     * @param $offset
     * @param $size
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserSimpleListByRole($accessToken, $roleId, $offset, $size)
    {
        try {
            $this->options['form_params'] = [
                'role_id' => $roleId,
                'offset' => $offset,
                'size' => $size,
            ];
            $response = $this->client->request('POST', Router::GET_ROLE_SIMPLE_LIST_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取角色组
     * @param $accessToken
     * @param $groupId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRoleGroupsList($accessToken, $groupId)
    {
        try {
            $this->options['form_params'] = [
                'group_id' => $groupId,
            ];
            $response = $this->client->request('POST', Router::GET_ROLE_GROUP_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    public function getRoleInfo($accessToken, $roleId)
    {
        try {
            $this->options['form_params'] = [
                'roleId' => $roleId,
            ];
            $response = $this->client->request('POST', Router::GET_ROLE_INFO_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 创建角色
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createRole($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'roleId'    => isset($data['roleId']) ? $data['roleId'] : '',
                'roleName'  => isset($data['roleName']) ? $data['roleName'] : '',
            ];
            $response = $this->client->request('POST', Router::CREATE_ROLE_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 更新角色
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateRole($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'roleId'    => isset($data['roleId']) ? $data['roleId'] : '',
                'roleName'  => isset($data['roleName']) ? $data['roleName'] : '',
            ];
            $response = $this->client->request('POST', Router::UPDATE_ROLE_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 删除角色
     * @param $accessToken
     * @param $roleId
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteRole($accessToken, $roleId)
    {
        try {
            $this->options['form_params'] = [
                'role_id' => $roleId
            ];
            $response = $this->client->request('POST', Router::DELETE_ROLE_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 创建角色组
     * @param $accessToken
     * @param $name
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createRoleGroup($accessToken, $name)
    {
        try {
            $this->options['form_params'] = [
                'name' => $name
            ];
            $response = $this->client->request('POST', Router::CREATE_ROLE_GROUP_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 批量增加员工角色
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createMultiRoles($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'roleIds' => isset($data['roleIds']) ? $data['roleIds'] : '',
                'userIds' => isset($data['userIds']) ? $data['userIds'] : '',
            ];
            $response = $this->client->request('POST', Router::CREATE_ROLE_MULTI_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 批量删除员工角色
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteMultiRoles($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'roleIds' => isset($data['roleIds']) ? $data['roleIds'] : '',
                'userIds' => isset($data['userIds']) ? $data['userIds'] : '',
            ];
            $response = $this->client->request('POST', Router::DELETE_ROLE_MULTI_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

}