<?php

require_once __DIR__ . '/../src/modules/social_media/TelegramBot.php';
require_once __DIR__ . '/../src/modules/social_media/TwitterBot.php';
require_once __DIR__ . '/../src/modules/social_media/FacebookPoster.php';
require_once __DIR__ . '/../src/modules/social_media/DiscordBot.php';

$telegramBot = new TelegramBot();
$twitterBot = new TwitterBot();
$facebookPoster = new FacebookPoster();
$discordBot = new DiscordBot();

echo "Telegram'a mesaj gönderiliyor...\n";
$telegramBot->sendMessage('CHAT_ID', 'Bu bir test mesajıdır.');

echo "Twitter'a tweet gönderiliyor...\n";
$twitterBot->postTweet('Bu bir test tweetidir.');

echo "Facebook sayfasına gönderi yapılıyor...\n";
$facebookPoster->postToPage('PAGE_ID', 'Bu bir test gönderisidir.');

echo "Discord kanalına mesaj gönderiliyor...\n";
$discordBot->sendMessage('Bu bir test mesajıdır.');
?>
