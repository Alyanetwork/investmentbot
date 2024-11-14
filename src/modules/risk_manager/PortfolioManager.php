<?php

require_once __DIR__ . '/../../models/Database.php';

class PortfolioManager
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addAssetToPortfolio($userId, $symbol, $amount, $allocationPercent)
    {
        $stmt = $this->conn->prepare("INSERT INTO portfolios (user_id, symbol, amount, allocation_percent) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $symbol, $amount, $allocationPercent]);
    }

    public function getPortfolio($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM portfolios WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateAssetAllocation($userId, $symbol, $newAllocation)
    {
        $stmt = $this->conn->prepare("UPDATE portfolios SET allocation_percent = ? WHERE user_id = ? AND symbol = ?");
        return $stmt->execute([$newAllocation, $userId, $symbol]);
    }
}
?>
