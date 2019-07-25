<?php


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
    public function createDepartInfo($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'name'              => isset($data['name']) ? $data['name'] : '',
                'parentid'          => isset($data['parentid']) ? $data['parentid'] : '',
                'order'             => isset($data['order']) ? $data['order'] : '',
                'createDeptGroup'   => isset($data['createDeptGroup']) ? $data['department'] : '',
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
    public function updateDepartInfo($accessToken, $data)
    {
        try {
            $this->options['form_params'] = [
                'name'              => isset($data['name']) ? $data['name'] : '',
                'parentid'          => isset($data['parentid']) ? $data['parentid'] : '',
                'order'             => isset($data['order']) ? $data['order'] : '',
                'createDeptGroup'   => isset($data['createDeptGroup']) ? $data['department'] : '',
                'deptHiding'        => isset($data['deptHiding']) ? $data['deptHiding'] : '',
                'deptPermits'       => isset($data['deptPermits']) ? $data['deptPermits'] : '',
                'userPermits'       => isset($data['userPermits']) ? $data['userPermits'] : '',
                'outerDept'         => isset($data['outerDept']) ? $data['outerDept'] : '',
                'outerPermitDepts'  => isset($data['outerPermitDepts']) ? $data['outerPermitDepts'] : '',
                'outerPermitUsers'  => isset($data['outerPermitUsers']) ? $data['outerPermitUsers'] : '',
                'sourceIdentifier'  => isset($data['sourceIdentifier']) ? $data['sourceIdentifier'] : '',
            ];
            $response = $this->client->request('POST', Router::UPDATE_DEPART_URL . '?access_token=' . $accessToken, $this->options);
            return $response->getBody();

        } catch (ClientException $e) {
            return $this->errorResponse($e);
        }
    }
}