<?php

class PricePrediction
{
    public static function predictPrice()
    {
        $command = escapeshellcmd('python3 src/ai_models/price_prediction.py');
        $output = shell_exec($command);
        return $output;
    }
}

// Örnek kullanım
$prediction = PricePrediction::predictPrice();
echo "Tahmin edilen fiyat: $prediction";
?>
