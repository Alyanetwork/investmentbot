<?php

require_once __DIR__ . '/../src/modules/order_manager/OrderManager.php';

$orderManager = new OrderManager();
try {
    $orderId = $orderManager->placeOrder(1, "BTCUSDT", "buy", "50000.00", "0.01");
    echo "Emir başarıyla oluşturuldu. Emir ID: " . $orderId;
} catch (Exception $e) {
    echo "Sipariş hatası: " . $e->getMessage();
}
?>
