<?php

require_once __DIR__ . '/Database.php';

class Analysis
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function generateReport($userId, $strategyId, $trades)
    {
        $totalTrades = count($trades);
        $wins = 0;
        $losses = 0;
        $totalGain = 0;
        $totalLoss = 0;

        foreach ($trades as $trade) {
            if ($trade['profit'] > 0) {
                $wins++;
                $totalGain += $trade['profit'];
            } else {
                $losses++;
                $totalLoss += abs($trade['profit']);
            }
        }

        $winRate = $totalTrades > 0 ? ($wins / $totalTrades) * 100 : 0;
        $roi = $totalGain - $totalLoss;
        $averageGain = $wins > 0 ? $totalGain / $wins : 0;
        $averageLoss = $losses > 0 ? $totalLoss / $losses : 0;

        $stmt = $this->conn->prepare("INSERT INTO analysis_reports (user_id, strategy_id, total_trades, win_rate, return_on_investment, average_gain, average_loss) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $strategyId, $totalTrades, $winRate, $roi, $averageGain, $averageLoss]);

        return [
            'win_rate' => $winRate,
            'roi' => $roi,
            'average_gain' => $averageGain,
            'average_loss' => $averageLoss
        ];
    }

    public function getReport($userId, $strategyId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM analysis_reports WHERE user_id = ? AND strategy_id = ?");
        $stmt->execute([$userId, $strategyId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
