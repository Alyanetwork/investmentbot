<?php

require_once __DIR__ . '/../../config/config.php';

class TelegramBot
{
    private $token;
    private $apiUrl;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->token = $config['telegram_token'];
        $this->apiUrl = "https://api.telegram.org/bot{$this->token}";
    }

    public function sendMessage($chatId, $message)
    {
        $url = "{$this->apiUrl}/sendMessage";
        $params = [
            'chat_id' => $chatId,
            'text' => $message
        ];
        HttpClient::get($url, [], $params);
    }
}
?>
