<?php

class HealthChecker
{
    public static function checkApiStatus($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 5 saniye timeout
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode === 200;
    }
}

// Örnek kullanım
if (!HealthChecker::checkApiStatus("https://api.binance.com")) {
    echo "Binance API çevrimdışı!";
}
?>
