<?php
/**
 * 部门
 */

namespace Gxheart\Http;

use GuzzleHttp\Exception\ClientException;
use Gxheart\Router;

class Department extends Base
{
    /**
     * 创建部门
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createDepart($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'name'              => $data['name'],
                'parentid'          => $data['parentid'],
                'order'             => isset($data['order']) ? $data['order'] : '',
                'createDeptGroup'   => isset($data['createDeptGroup']) ? $data['createDeptGroup'] : '',
                'deptHiding'        => isset($data['deptHiding']) ? $data['deptHiding'] : '',
                'deptPermits'       => isset($data['deptPermits']) ? $data['deptPermits'] : '',
                'userPermits'       => isset($data['userPermits']) ? $data['userPermits'] : '',
                'outerDept'         => isset($data['outerDept']) ? $data['outerDept'] : '',
                'outerPermitDepts'  => isset($data['outerPermitDepts']) ? $data['outerPermitDepts'] : '',
                'outerPermitUsers'  => isset($data['outerPermitUsers']) ? $data['outerPermitUsers'] : '',
                'sourceIdentifier'  => isset($data['sourceIdentifier']) ? $data['sourceIdentifier'] : '',
            ];
            $response = $this->client->request('POST', Router::CREATE_DEPART_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 更新部门
     * @param $accessToken
     * @param $data
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateDepart($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'name'                  => isset($data['name']) ? $data['name'] : '',
                'parentid'              => isset($data['parentid']) ? $data['parentid'] : '',
                'order'                 => isset($data['order']) ? $data['order'] : '',
                'id'                    => $data['id'],
                'createDeptGroup'       => isset($data['createDeptGroup']) ? $data['createDeptGroup'] : '',
                'autoAddUser'           => isset($data['autoAddUser']) ? $data['autoAddUser'] : '',
                'deptManagerUseridList' => isset($data['deptManagerUseridList']) ? $data['deptManagerUseridList'] : '',
                'deptHiding'            => isset($data['deptHiding']) ? $data['deptHiding'] : '',
                'deptPermits'           => isset($data['deptPermits']) ? $data['deptPermits'] : '',
                'userPermits'           => isset($data['userPermits']) ? $data['userPermits'] : '',
                'outerDept'             => isset($data['outerDept']) ? $data['outerDept'] : '',
                'outerPermitDepts'      => isset($data['outerPermitDepts']) ? $data['outerPermitDepts'] : '',
                'outerPermitUsers'      => isset($data['outerPermitUsers']) ? $data['outerPermitUsers'] : '',
                'orgDeptOwner'          => isset($data['orgDeptOwner']) ? $data['orgDeptOwner'] : '',
                'sourceIdentifier'      => isset($data['sourceIdentifier']) ? $data['sourceIdentifier'] : '',
            ];
            $response = $this->client->request('POST', Router::UPDATE_DEPART_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 删除部门
     * @param $accessToken
     * @param $id
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteDepart($accessToken, $id)
    {
        try {
            $this->options['query'] = [
                'id' => $id,
                'access_token' => $accessToken,
            ];
            $response = $this->client->request('GET', Router::DELETE_DEPART_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取子部门ID列表
     * @param $accessToken
     * @param $id
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getChildDepartList($accessToken, $id)
    {
        try {
            $this->options['query'] = [
                'id' => $id,
                'access_token' => $accessToken,
            ];
            $response = $this->client->request('GET', Router::GET_DEART_IDS_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取部门列表
     * @param $accessToken
     * @param $data
     * @param string $lang
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepartList($accessToken, $data, $lang="zh_CN")
    {
        try {
            $this->options['query'] = [
                'id'            => $data['id'],
                'fetch_child'   => isset($data['fetch_child']) ? $data['fetch_child'] : '',
                'access_token'  => $accessToken,
                'lang'          => $lang,
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_LIST_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 获取部门详情
     * @param $accessToken
     * @param $id
     * @param string $lang
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepartInfo($accessToken, $id, $lang="zh_CN")
    {
        try {
            $this->options['query'] = [
                'id'           => $id,
                'access_token' => $accessToken,
                'lang'         => $lang,
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_INFO_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * 查询部门的所有上级父部门路径
     * @param $accessToken
     * @param $id
     * @return array|false|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepartParentIds($accessToken, $id)
    {
        try {
            $this->options['query'] = [
                'id'            => $id,
                'access_token'  => $accessToken,
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_PARENTID_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }

    public function getUserDepartParentIds($accessToken, $userId)
    {
        try {
            $this->options['query'] = [
                'userId'        => $userId,
                'access_token'  => $accessToken,
            ];
            $response = $this->client->request('GET', Router::GET_DEPART_USER_PARENTID_URL, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}