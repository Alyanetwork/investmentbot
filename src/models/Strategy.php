<?php

require_once __DIR__ . '/Database.php';

class Strategy
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createStrategy($name, $description, $parameters)
    {
        $stmt = $this->conn->prepare("INSERT INTO strategies (name, description, parameters) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, json_encode($parameters)]);
        return $this->conn->lastInsertId();
    }

    public function getStrategies()
    {
        $stmt = $this->conn->prepare("SELECT * FROM strategies");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStrategyById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM strategies WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
