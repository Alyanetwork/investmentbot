<?php

require_once __DIR__ . '/Database.php';

class Notification
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getNotificationSettings($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM notification_settings WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateNotificationSettings($userId, $settings)
    {
        $stmt = $this->conn->prepare("UPDATE notification_settings SET email_notifications = ?, sms_notifications = ?, push_notifications = ?, stop_loss_alert = ?, strategy_alert = ? WHERE user_id = ?");
        return $stmt->execute([
            $settings['email_notifications'],
            $settings['sms_notifications'],
            $settings['push_notifications'],
            $settings['stop_loss_alert'],
            $settings['strategy_alert'],
            $userId
        ]);
    }

    public function logNotification($userId, $message, $type, $status)
    {
        $stmt = $this->conn->prepare("INSERT INTO notifications (user_id, message, type, status) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $message, $type, $status]);
    }
}
?>
