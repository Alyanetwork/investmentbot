<?php

require_once __DIR__ . '/../src/auth/WalletAuth.php';

$data = json_decode(file_get_contents('php://input'), true);
$address = $data['account'];
$signature = $data['signature'];
$message = "Giriş işlemi için bu mesajı imzalayın."; // Aynı mesajı sunucuda da kullanın

if (WalletAuth::verifySignature($address, $message, $signature)) {
    echo json_encode(["success" => true, "message" => "Giriş başarılı"]);
} else {
    echo json_encode(["success" => false, "message" => "Giriş başarısız"]);
}
?>
