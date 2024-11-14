<?php

require_once __DIR__ . '/../src/modules/strategy/StrategyRunner.php';

$strategyRunner = new StrategyRunner(1); // ID = 1 olan stratejiyi çalıştır
$sinyal = $strategyRunner->run("BTCUSDT");

echo "Sinyal: " . $sinyal;
?>
