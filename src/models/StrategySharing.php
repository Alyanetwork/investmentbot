<?php

require_once __DIR__ . '/Database.php';

class StrategySharing
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addStrategy($userId, $name, $description)
    {
        $stmt = $this->conn->prepare("INSERT INTO strategies (user_id, name, description) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $name, $description]);
    }

    public function getStrategies()
    {
        $stmt = $this->conn->prepare("SELECT * FROM strategies");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
