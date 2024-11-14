<?php

require_once __DIR__ . '/../src/modules/tradingview/TradingViewChart.php';

$chart = new TradingViewChart();
echo $chart->getChartEmbedHtml("NASDAQ:AAPL");

$indicators = ["RSI", "MACD"];
echo $chart->getChartWithIndicators("NASDAQ:AAPL", $indicators);
?>
