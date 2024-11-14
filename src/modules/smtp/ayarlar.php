<?php

function sendEmail($to, $subject, $message)
{
    $headers = "From: noreply@investmentbot.com";
    return mail($to, $subject, $message, $headers);
}

// Örnek kullanım: Haftalık rapor gönderme
$userEmail = "user@example.com";
$subject = "Haftalık İşlem Raporunuz";
$message = "Bu hafta boyunca yaptığınız işlemler ve performans raporunuz ektedir.";
sendEmail($userEmail, $subject, $message);
?>
