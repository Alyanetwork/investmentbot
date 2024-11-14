<?php

require_once __DIR__ . '/../../config/config.php';

class DiscordBot
{
    private $webhookUrl;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->webhookUrl = $config['discord_webhook_url'];
    }

    public function sendMessage($message)
    {
        $params = [
            'content' => $message
        ];
        HttpClient::get($this->webhookUrl, [], $params);
    }
}
?>
