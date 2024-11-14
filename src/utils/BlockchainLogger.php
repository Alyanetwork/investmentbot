<?php

require 'vendor/autoload.php';

use Web3\Web3;
use Web3\Contract;

class BlockchainLogger
{
    private $web3;
    private $contract;
    private $address;
    private $privateKey;

    public function __construct()
    {
        // Ethereum testnet (örneğin Rinkeby) URL ve cüzdan bilgileri
        $this->web3 = new Web3('https://rinkeby.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $this->address = 'YOUR_ETH_ADDRESS';
        $this->privateKey = 'YOUR_PRIVATE_KEY';
    }

    public function logTransaction($userId, $action, $details)
    {
        // Veriyi JSON formatında saklamak için
        $data = json_encode([
            'userId' => $userId,
            'action' => $action,
            'details' => $details
        ]);

        // Ethereum ağında işlem başlat
        $this->web3->eth->sendTransaction([
            'from' => $this->address,
            'to' => 'TARGET_CONTRACT_ADDRESS', // İşlem kaydedilecek adres veya sözleşme
            'data' => '0x' . bin2hex($data)
        ], function ($err, $tx) {
            if ($err !== null) {
                echo 'Hata: ' . $err->getMessage();
                return;
            }
            echo 'İşlem Kaydedildi: ' . $tx;
        });
    }
}
?>
