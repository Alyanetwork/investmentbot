<?php

require_once __DIR__ . '/../../models/ExchangeInterface.php';
require_once __DIR__ . '/../../utils/HttpClient.php';

class Bitfinex implements ExchangeInterface
{
    private $apiKey;
    private $apiSecret;
    private $baseUrl = 'https://api.bitfinex.com/v1';

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $this->apiKey = $config['bitfinex_api_key'];
        $this->apiSecret = $config['bitfinex_api_secret'];
    }

    public function getMarketData($symbol)
    {
        $url = $this->baseUrl . "/pubticker/{$symbol}";
        return HttpClient::get($url);
    }

    public function placeOrder($symbol, $side, $quantity, $price = null, $orderType = 'market')
    {
        $url = $this->baseUrl . "/order/new";
        $params = [
            'symbol' => $symbol,
            'amount' => $quantity,
            'price' => $price ?: '0.0',
            'exchange' => 'bitfinex',
            'side' => $side,
            'type' => $orderType
        ];

        return HttpClient::post($url, $this->getAuthHeaders($params), $params);
    }

    public function getOrderStatus($orderId)
    {
        $url = $this->baseUrl . "/order/status";
        $params = ['order_id' => $orderId];
        return HttpClient::post($url, $this->getAuthHeaders($params), $params);
    }

    public function cancelOrder($orderId)
    {
        $url = $this->baseUrl . "/order/cancel";
        $params = ['order_id' => $orderId];
        return HttpClient::post($url, $this->getAuthHeaders($params), $params);
    }

    private function getAuthHeaders($params)
    {
        $nonce = (string) (time() * 1000000);
        $body = json_encode($params);
        $signature = hash_hmac('sha384', "/v1/order/new" . $nonce . $body, $this->apiSecret);

        return [
            'X-BFX-APIKEY: ' . $this->apiKey,
            'X-BFX-PAYLOAD: ' . base64_encode($body),
            'X-BFX-SIGNATURE: ' . $signature
        ];
    }
}
?>
