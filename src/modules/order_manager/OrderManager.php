<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Order.php';
require_once __DIR__ . '/../../utils/HttpClient.php';

class OrderManager
{
    private $order;
    private $apiKey;
    private $apiSecret;
    private $apiBaseUrl;

    public function __construct()
    {
        $this->order = new Order();
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiKey = $config['api_key'];
        $this->apiSecret = $config['api_secret'];
        $this->apiBaseUrl = $config['api_base_url'];
    }

    public function placeOrder($userId, $symbol, $orderType, $price, $quantity)
    {
        $url = $this->apiBaseUrl . "/api/v3/order";
        $params = [
            'symbol' => $symbol,
            'side' => strtoupper($orderType),
            'type' => 'LIMIT',
            'price' => $price,
            'quantity' => $quantity,
            'timeInForce' => 'GTC'
        ];

        $headers = [
            'X-MBX-APIKEY: ' . $this->apiKey
        ];

        // Sipariş gönder ve sonuç döndür
        $response = HttpClient::get($url, $headers, $params);
        if (isset($response['orderId'])) {
            $orderId = $this->order->createOrder($userId, $symbol, $orderType, $price, $quantity);
            return $orderId;
        }

        throw new Exception("Emir gönderilemedi: " . json_encode($response));
    }
}
?>
