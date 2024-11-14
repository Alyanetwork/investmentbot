<?php

require_once __DIR__ . '/../src/modules/notifier/Notifier.php';

$notifier = new Notifier();
$userId = 1;
$message = "Strateji sinyali tetiklendi: SAT sinyali geldi.";

// E-posta bildirimi gönder
echo "E-posta bildirimi gönderiliyor...\n";
$notifier->sendEmail($userId, $message);

// SMS bildirimi gönder
echo "SMS bildirimi gönderiliyor...\n";
$notifier->sendSMS($userId, $message);

// Anlık bildirim gönder
echo "Anlık bildirim gönderiliyor...\n";
$notifier->sendPushNotification($userId, $message);
?>
