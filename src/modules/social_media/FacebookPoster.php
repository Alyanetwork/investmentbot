<?php

require_once __DIR__ . '/../../config/config.php';

class FacebookPoster
{
    private $accessToken;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->accessToken = $config['facebook_access_token'];
    }

    public function postToPage($pageId, $message)
    {
        $url = "https://graph.facebook.com/{$pageId}/feed";
        $params = [
            'access_token' => $this->accessToken,
            'message' => $message
        ];
        HttpClient::get($url, [], $params);
    }
}
?>
