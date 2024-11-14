<?php

require_once __DIR__ . '/../src/models/RiskManager.php';

$riskManager = new RiskManager();
$userId = 1;
$initialPrice = 100.0;
$currentPrice = 85.0;

// Stop-loss kontrolü
$stopLoss = $riskManager->checkStopLoss($initialPrice, $currentPrice, 10); // %10 stop-loss
echo "Stop-Loss Tetiklendi mi? " . ($stopLoss ? "Evet" : "Hayır") . "\n";

// Kar-al kontrolü
$takeProfit = $riskManager->checkTakeProfit($initialPrice, 115.0, 10); // %10 kar-al
echo "Kar-Al Tetiklendi mi? " . ($takeProfit ? "Evet" : "Hayır") . "\n";
?>
