<?php

require_once __DIR__ . '/../../models/Analysis.php';

class ReportGenerator
{
    private $analysis;

    public function __construct()
    {
        $this->analysis = new Analysis();
    }

    public function generatePerformanceChart($userId, $strategyId)
    {
        $report = $this->analysis->getReport($userId, $strategyId);

        if ($report) {
            // Görselleştirme için basit ASCII tablosu
            echo "-----------------------\n";
            echo "Kullanıcı ID: {$userId}\n";
            echo "Strateji ID: {$strategyId}\n";
            echo "Toplam İşlem: {$report['total_trades']}\n";
            echo "Kazanma Oranı: {$report['win_rate']}%\n";
            echo "ROI: {$report['return_on_investment']}%\n";
            echo "Ortalama Kazanç: {$report['average_gain']}\n";
            echo "Ortalama Kayıp: {$report['average_loss']}\n";
            echo "-----------------------\n";
        } else {
            echo "Rapor bulunamadı.\n";
        }
    }
}
?>
