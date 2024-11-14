<?php

require_once __DIR__ . '/Database.php';

class Logger
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function log($userId, $action, $details)
    {
        $stmt = $this->conn->prepare("INSERT INTO logs (user_id, action, details) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $action, $details]);
    }
}
?>
