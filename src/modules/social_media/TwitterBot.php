<?php

require_once __DIR__ . '/../../config/config.php';
require_once 'path/to/twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterBot
{
    private $connection;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->connection = new TwitterOAuth(
            $config['twitter_api_key'],
            $config['twitter_api_secret_key']
        );
    }

    public function postTweet($message)
    {
        $this->connection->post("statuses/update", ["status" => $message]);
    }
}
?>
