<?php

require_once __DIR__ . '/Database.php';

class RiskManager
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getRiskSettings($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM risk_settings WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function setStopLoss($userId, $percent)
    {
        $stmt = $this->conn->prepare("UPDATE risk_settings SET stop_loss_percent = ? WHERE user_id = ?");
        return $stmt->execute([$percent, $userId]);
    }

    public function setTakeProfit($userId, $percent)
    {
        $stmt = $this->conn->prepare("UPDATE risk_settings SET take_profit_percent = ? WHERE user_id = ?");
        return $stmt->execute([$percent, $userId]);
    }

    public function checkStopLoss($initialPrice, $currentPrice, $stopLossPercent)
    {
        $loss = (($initialPrice - $currentPrice) / $initialPrice) * 100;
        return $loss >= $stopLossPercent;
    }

    public function checkTakeProfit($initialPrice, $currentPrice, $takeProfitPercent)
    {
        $profit = (($currentPrice - $initialPrice) / $initialPrice) * 100;
        return $profit >= $takeProfitPercent;
    }
}
?>
