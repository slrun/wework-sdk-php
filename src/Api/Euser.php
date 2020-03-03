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
     * 获取外部联系人详情
     *
     * @param string $externalUserId
     * @return array
     */
    public function get(string $externalUserId): array
    {
        return $this->httpClient->get('externalcontact/get', ['external_userid' => $externalUserId]);
    }
}
