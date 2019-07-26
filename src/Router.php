<?php

/**
 * Class Router
 */
namespace Gxheart;

class Router
{
    // accesstoken获取
    const GET_ACCESS_TOKEN_URL =                    'gettoken'; // 获取access_token

    // 身份验证
    const GET_USER_ID_URL =                         'user/getuserinfo'; // 获取用户userid
    const GET_SSO_TOKEN_URL =                       'sso/gettoken'; //获取应用后台免登的accessToken
    const GET_SSO_USER_INFO_URL =                   'sso/getuserinfo'; // 获取应用管理员的身份信息
    const CREATE_QRCODE_LOGIN_URL =                 'connect/qrconnect'; // 构造扫码登录页面
    const GET_USER_INFO_BYCODE_URL =                'sns/getuserinfo_bycode'; // 服务端通过临时授权码获取授权用户的个人信息
    const CREATE_OAUTH2_LOGIN_URL =                 'connect/oauth2/sns_authorize'; // 构造要跳转的链接

    // 用户管理
    const CREATE_USER_URL =                         'user/create'; // 创建用户
    const UPDATE_USER_URL =                         'user/update'; // 更新用户
    const DELETE_USER_URL =                         'user/delete'; // 删除用户
    const GET_USER_INFO_URL =                       'user/get'; // 获取用户详情
    const GET_DEPART_USERID_LIST_URL =              'user/getDeptMember'; // 获取部门用户userid列表
    const GET_DEPART_USER_SIMPLE_LIST_URL =         'user/simplelist'; // 获取部门用户
    const GET_DEPART_USER_LIST_URL =                'user/listbypage'; // 获取部门用户详情
    const GET_ADMIN_LIST_URL =                      'user/get_admin'; // 获取管理员列表
    const GET_ADMIN_SCOPE_URL =                     'user/get_admin_scope'; // 获取管理员通讯录权限范围
    const GET_USEID_BYUNIONID_URL =                 'user/getUseridByUnionid'; // 根据unionid获取userid
    const GET_ORG_USER_COUNT_URL =                  'user/get_org_user_count'; // 获取企业员工人数

    // 部门管理
    const CREATE_DEPART_URL =                       'department/create'; // 创建部门
    const UPDATE_DEPART_URL =                       'department/update'; // 更新部门
    const DELETE_DEPART_URL =                       'department/delete'; // 删除部门
    const GET_DEART_IDS_URL =                       'department/list_ids'; // 获取子部门id列表
    const GET_DEPART_LIST_URL =                     'department/list'; // 获取部门列表
    const GET_DEPART_INFO_URL =                     'department/get'; // 获取部门详情
    const GET_DEPART_PARENTID_URL =                 'department/list_parent_depts_by_dept'; // 查询部门的所有上级父部门路径
    const GET_DEPART_USER_PARENTID_URL =            'department/list_parent_depts'; // 查询指定用户的所有上级父部门路径

    // 角色管理
    const GET_ROLE_LIST_URL =                       'topapi/role/list'; // 获取角色列表
    const GET_ROLE_SIMPLE_LIST_URL =                'topapi/role/simplelist'; // 获取角色下的员工列表
    const GET_ROLE_GROUP_URL =                      'topapi/role/getrolegroup'; // 获取角色组
    const GET_ROLE_INFO_URL =                       'topapi/role/getrole'; // 获取角色详情
    const CREATE_ROLE_URL =                         'role/add_role'; // 创建角色
    const UPDATE_ROLE_URL =                         'role/update_role'; // 更新角色
    const DELETE_ROLE_URL =                         'topapi/role/deleterole'; // 删除角色
    const CREATE_ROLE_GROUP_URL =                   'role/add_role_group'; // 创建角色组
    const CREATE_ROLE_MULTI_URL =                   'topapi/role/addrolesforemps'; // 批量增加员工角色
    const DELETE_ROLE_MULTI_URL =                   'topapi/role/removerolesforemps'; // 批量删除员工角色

    // 外部联系人管理
    const GET_EXTCONTACT_LABEL_URL =                'topapi/extcontact/listlabelgroups'; // 获取外部联系人标签列表
    const GET_EXTCONTACT_URL =                      'topapi/extcontact/list'; // 获取外部联系人列表
    const GET_EXTCONTACT_INFO_URL =                 'topapi/extcontact/get'; // 获取外部联系人详情
    const CREATE_EXTCONTACT_URL =                   'topapi/extcontact/create'; // 添加外部联系人
    const UPDATE_EXTCONTACT_URL =                   'topapi/extcontact/update'; // 更新外部联系人
    const DELETE_EXTCONTACT_URL =                   'topapi/extcontact/delete'; // 删除外部联系人

    // 通讯录权限范围
    const GET_AUTH_SCOPES_URL =                     'auth/scopes'; // 获取通讯录权限范围

    // 消息通知
    const SEND_WORK_MSG_URL =                       'topapi/message/corpconversation/asyncsend_v2'; // 发送工作通知消息
    const GET_WORK_MSG_PROGRESS_URL =               'topapi/message/corpconversation/getsendprogress'; // 查询工作通知消息的发送进度
    const GET_WORK_MSG_RESULT_URL =                 'topapi/message/corpconversation/getsendresult'; // 查询工作通知消息的发送结果
    const RECALL_WORK_MSG_URL =                     'topapi/message/corpconversation/recall'; // 工作通知消息撤回
    const SEND_CHAT_MSG_URL =                       'chat/send'; // 发送群消息
    const GET_CHAT_MSG_READ_URL =                   'chat/getReadList'; // 查询群消息已读人员列表
    const CREATE_CHAT_URL =                         'chat/create'; // 创建会话
    const UPDATE_CHAT_URL =                         'chat/update'; // 修改会话
    const GET_CHAT_URL =                            'chat/get'; // 获取会话
    const SEND_NORMAL_URL =                         'message/send_to_conversation'; // 发送普通消息

    // 审批待办
    const CREATE_PROCESSINS_URL =                   'topapi/processinstance/create'; // 发起审批实例
    const GET_PROCESSINS_LIST_URL =                 'topapi/processinstance/listids'; // 批量获取审批实例id
    const GET_PROCESSINS_INFO_URL =                 'topapi/processinstance/get'; // 获取审批实例详情
    const GET_USER_TODO_NUM_URL =                   'topapi/process/gettodonum'; // 获取用户待审批数量
    const GET_USER_LIST_BY_UID_URL =                'topapi/process/listbyuserid'; // 获取用户可见的审批模板
    const GET_PROCESS_CSPACE_INFO_URL =             'topapi/processinstance/cspace/info'; // 获取审批钉盘空间信息
    const SAVE_PROCESS_URL =                        'topapi/process/save'; // 创建或更新待办模板
    const DELETE_PROCESS_URL =                      'topapi/process/delete'; // 删除待办模板
    const CREATE_PROCESS_URL =                      'topapi/process/workrecord/create'; // 创建待办实例
    const UPDATE_PROCESSINC_STATUS_URL =            'topapi/process/workrecord/update'; // 更新实例状态
    const CREATE_PROCESS_TASK_URL =                 'topapi/process/workrecord/task/create'; // 创建待办任务
    const UPDATE_TASK_STATUS_URL =                  'topapi/process/workrecord/task/update'; // 更新任务状态
    const CANCEL_PROCESS_MULTI_URL =                'topapi/process/workrecord/taskgroup/cancel'; // 批量取消任务

    // 智能人事
    const GET_EMPLOYEE_FIELD_URL =                  'topapi/smartwork/hrm/employee/list'; // 获取员工花名册字段信息
    const GET_EMPLOYEE_QUERYPREENTRY_URL =          'topapi/smartwork/hrm/employee/querypreentry'; // 查询企业待入职员工列表
    const GET_EMPLOYEE_QUERYONJOB_URL =             'topapi/smartwork/hrm/employee/queryonjob'; // 查询企业在职员工列表
    const GET_EMPLOYEE_QUERY_DISMISSION_URL =       'topapi/smartwork/hrm/employee/querydimission'; // 查询企业离职员工列表
    const GET_EMPLOYEE_QUERY_DISMISSION_LIST_URL =  'topapi/smartwork/hrm/employee/listdimission'; // 获取离职员工离职信息
    const GET_EMPLOYEE_ADDPREENTRY_URL =            'topapi/smartwork/hrm/employee/addpreentry'; // 添加企业待入职员工

    // 日志
    const GET_USER_REPORT_URL =                     'topapi/report/list'; // 获取用户日志数据
    const GET_REPORT_STATISTICS_URL =               'topapi/report/statistics'; // 获取日志统计数据
    const GET_REPORT_STATISTICS_USER_LIST_URL =     'topapi/report/statistics/listbytype'; // 获取日志相关人员列表
    const GET_REPORT_RECEIVER_LIST_URL =            'topapi/report/receiver/list'; // 获取日志接收人员列表
    const GET_REPORT_COMMENT_LIST_URL =             'topapi/report/comment/list'; // 获取日志评论详情
    const GET_REPORT_UNREAD_COUNT_URL =             'topapi/report/getunreadcount'; // 获取用户日志未读数
    const GET_USER_REPORT_TEMP_URL =                'topapi/report/template/listbyuserid'; // 获取用户可见的日志模板

    // 考勤
    const GET_ATTENDANCE_SCHEDULE_LIST_URL =        'topapi/attendance/listschedule'; // 企业考勤排班详情
    const GET_ATTENDANCE_SIMPLE_GROUP_URL =         'topapi/attendance/getsimplegroups'; // 企业考勤组详情
    const GET_ATTENDANCE_RECORD_INFO_URL =          'attendance/listRecord'; // 获取打卡详情
    const GET_ATTENDANCE_RECORD_RESULT_URL =        'attendance/list'; // 获取打开结果
    const GET_ATTENDANCE_LEAVE_DURATION_URL =       'attendance/getleaveapproveduration'; // 获取请假时长
    const GET_ATTENDANCE_LEAVE_STATUS_URL =         'topapi/attendance/getleavestatus'; // 查询请假状态
    const GET_ATTENDANCE_USER_GROUP_URL =           'topapi/attendance/getusergroup'; // 获取用户考勤组

    // DING日程
    const CREATE_DING_CALENDAR_URL =                'topapi/calendar/create'; // 创建DING日程

    // 签到
    const GET_DEPART_USER_CHECKIN_RECORD_URL =      'checkin/record'; // 获取部门用户签到记录
    const GET_USER_CHECKIN_RECORD_URL =             'topapi/checkin/record/get'; // 获取用户签到记录
    const GET_USER_BLACKBOARD_LIST_URL =            'topapi/blackboard/listtopten'; // 获取用户公告数据
    const GET_MICROAPP_LIST_URL =                   'microapp/list'; // 获取应用列表
    const GET_MICROAPP_LIST_BYUID_URL =             'microapp/list_by_userid'; // 获取员工可见的应用列表
    const GET_MICROAPP_VISIBLE_SCOPES_URL =         'microapp/visible_scopes'; // 获取应用的可见范围
    const SET_MICROAPP_VISIBLE_SCOPES_URL =         'microapp/set_visible_scopes'; // 设置应用的可见范围
    const GET_HEALTH_STEPINFO_STATUS_URL =          'topapi/health/stepinfo/getuserstatus'; // 获取用户钉钉运动开启状态
    const GET_HEALTH_STEPINFO_LIST_URL =            'topapi/health/stepinfo/list'; // 获取个人或部门的钉钉运动数据
    const GET_HEALTH_STEPLIST_BYUID_URL =           'topapi/health/stepinfo/listbyuserid'; // 批量获取钉钉运动数据

    // 群机器人（自定义机器人）
    const GET_ROBOT_SEND_URL =                      'robot/send'; // 自定义机器人
}