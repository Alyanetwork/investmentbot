<?php

require_once __DIR__ . '/../../models/Notification.php';

class Notifier
{
    private $notification;

    public function __construct()
    {
        $this->notification = new Notification();
    }

    public function sendEmail($userId, $message)
    {
        $settings = $this->notification->getNotificationSettings($userId);
        if ($settings['email_notifications'] === 'on') {
            // E-posta gönderme işlemi
            $to = "user@example.com"; // Kullanıcı e-posta adresi
            $subject = "Yatırım Uyarısı";
            $headers = "From: noreply@investmentbot.com";
            
            if (mail($to, $subject, $message, $headers)) {
                $this->notification->logNotification($userId, $message, 'email', 'sent');
            } else {
                $this->notification->logNotification($userId, $message, 'email', 'failed');
            }
        }
    }

    public function sendSMS($userId, $message)
    {
        $settings = $this->notification->getNotificationSettings($userId);
        if ($settings['sms_notifications'] === 'on') {
            // Twilio API entegrasyonu (örnek)
            $status = 'sent'; // Başarıyla gönderildi varsayımı
            
            // Bildirim durumunu kaydet
            $this->notification->logNotification($userId, $message, 'sms', $status);
        }
    }

    public function sendPushNotification($userId, $message)
    {
        $settings = $this->notification->getNotificationSettings($userId);
        if ($settings['push_notifications'] === 'on') {
            // Tarayıcı veya uygulama içi bildirim gönderme işlemi
            $this->notification->logNotification($userId, $message, 'push', 'sent');
        }
    }
}
?>
