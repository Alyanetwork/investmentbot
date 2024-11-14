<?php

class EmailNotifier
{
    public static function sendEmail($to, $subject, $message)
    {
        $headers = "From: noreply@investmentbot.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8";
        return mail($to, $subject, $message, $headers);
    }
}
?>
