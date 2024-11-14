<?php

require_once __DIR__ . '/Database.php';

class Order
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createOrder($userId, $symbol, $orderType, $price, $quantity)
    {
        $stmt = $this->conn->prepare("INSERT INTO orders (user_id, symbol, order_type, price, quantity, status) VALUES (?, ?, ?, ?, ?, 'pending')");
        $stmt->execute([$userId, $symbol, $orderType, $price, $quantity]);
        return $this->conn->lastInsertId();
    }

    public function updateOrderStatus($orderId, $status)
    {
        $stmt = $this->conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $orderId]);
    }

    public function getOrder($orderId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
