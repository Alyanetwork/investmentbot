<?php

require_once __DIR__ . '/../src/modules/report_generator/ReportGenerator.php';

$reportGenerator = new ReportGenerator();
$userId = 1;
$strategyId = 1;

echo "Performans Raporu:\n";
$reportGenerator->generatePerformanceChart($userId, $strategyId);
?>
