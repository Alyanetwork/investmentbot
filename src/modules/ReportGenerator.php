<?php

require_once __DIR__ . '/../models/Logger.php';

class ReportGenerator
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger();
    }

    public function generateCsvReport($userId)
    {
        $logs = $this->logger->getUserLogs($userId);
        $filename = "user_{$userId}_logs.csv";

        $file = fopen($filename, 'w');
        fputcsv($file, ['ID', 'Action', 'Details', 'Created At']);

        foreach ($logs as $log) {
            fputcsv($file, $log);
        }

        fclose($file);
        return $filename;
    }

    public function generatePdfReport($userId)
    {
        // Bir PDF kütüphanesi kullanarak logları PDF formatında raporlayabiliriz
        // Bu örnekte TCPDF veya FPDF gibi kütüphaneler kullanılabilir.
    }
}
?>
