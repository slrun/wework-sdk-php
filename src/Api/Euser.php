<?php

namespace WeWork\Api;

use WeWork\Traits\HttpClientTrait;

class Euser
{
    use HttpClientTrait;

    /**
     * 获取配置了客户联系功能的成员列表
     * 
     * @return [type] [description]
     */
    public function getFollowUserList(): array 
    {
        return $this->httpClient->get('externalcontact/get_follow_user_list');
    }

    /**
     * 根据员工ID获取客户列表
     * 
     * @param  string $userId [description]
     * @return [type]         [description]
     */
    public function list(string $userId): array 
    {
        return $this->httpClient->get('externalcontact/list', ['userid' => $userId]);
    }

    /**
     * 获取外部联系人详情
     *
     * @param string $externalUserId
     * @return array
     */
    public function get(string $externalUserId): array
    {
        return $this->httpClient->get('externalcontact/get', ['external_userid' => $externalUserId]);
    }

    /**
     * 修改员工客户的备注
     * @param  array  $json [description]
     * @return [type]       [description]
     */
    public function remark(array $json): array 
    {
        return $this->httpClient->postJson('externalcontact/remark', $json);
    }

    /**
     * 获取企业给客户的标签库
     * @param  array  $tagIds [description]
     * @return [type]         [description]
     */
    public function getCorpTagList(array $tagIds): array 
    {
        return $this->httpClient->get('externalcontact/get_corp_tag_list', $tagIds);
    }

    /**
     * 获取未分配的客户列表
     * @param  int|integer $pageId   [description]
     * @param  int|integer $pageSize [description]
     * @return [type]                [description]
     */
    public function getUnassignedList(int $pageId = 0, int $pageSize = 1000): array 
    {
        return $this->httpClient->postJson('externalcontact/get_unassigned_list', ['page_id' => $pageId, 'page_size' => $pageSize]);
    }

    /**
     * 发送个性化欢迎语
     * @param  array  $json [description]
     * @return [type]       [description]
     */
    public function sendWelcomeMsg(array $json): array 
    {
        return $this->httpClient->postJson('externalcontact/send_welcome_msg', $json);
    }

    /**
     * 获取联系客户统计数据
     * @param  array  $json [description]
     * @return [type]       [description]
     */
    public function getUserBehaviorData(array $json): array 
    {
        return $this->httpClient->postJson('externalcontact/get_user_behavior_data', $json);
    }

    /**
     * 获取客户群统计数据
     * @param  array  $json [description]
     * @return [type]       [description]
     */
    public function getGroupchatStatistic(array $json): array 
    {
        return $this->httpClient->postJson('externalcontact/groupchat/statistic', $json);
    }

    /**
     * 获取客户群列表
     * @param  int|integer $statusFilter [description]
     * @param  array       $ownerFilter  [description]
     * @param  int|integer $offset       [description]
     * @param  int|integer $limit        [description]
     * @return [type]                    [description]
     */
    public function getGroupchatList(int $statusFilter = 0, array $ownerFilter = [], int $offset = 0, int $limit = 100)
    {
        return $this->httpClient->postJson('externalcontact/groupchat/list', [
            'status_filter' => $statusFilter,
            'owner_filter' => $ownerFilter,
            'offset' => $offset,
            'limit' => $limit
        ]);
    }

    /**
     * 获取客户群详情
     * @param  [type] $chatId [description]
     * @return [type]         [description]
     */
    public function getGroupChat($chatId)
    {
        return $this->httpClient->postJson('externalcontact/groupchat/get', [
            'chat_id' => $chatId
        ]);
    }
}