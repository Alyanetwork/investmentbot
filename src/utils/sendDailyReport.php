<?php

require_once __DIR__ . '/../utils/EmailNotifier.php';
require_once __DIR__ . '/../modules/ReportGenerator.php';

function sendDailyReport($userId, $userEmail)
{
    $reportGenerator = new ReportGenerator();
    $reportFile = $reportGenerator->generateCsvReport($userId);

    $subject = "Günlük İşlem Raporunuz";
    $message = "Günlük işlem raporunuzu ektedir.";
    EmailNotifier::sendEmail($userEmail, $subject, $message);

    // E-posta ile raporun PDF veya CSV dosyasını ek olarak göndermek için SMTP veya PHPMailer kullanabilirsiniz.
}
?>
