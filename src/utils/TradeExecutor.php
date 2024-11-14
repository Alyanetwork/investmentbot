<?php

require 'vendor/autoload.php';

use Web3\Web3;
use Web3\Contract;

class TradeExecutor
{
    private $web3;
    private $contract;

    public function __construct()
    {
        $this->web3 = new Web3('https://rinkeby.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $this->contract = new Contract($this->web3->provider, 'CONTRACT_ABI');
    }

    public function executeTrade($amount, $tradeType)
    {
        $this->contract->at('CONTRACT_ADDRESS')->send('executeTrade', $amount, $tradeType, [
            'from' => 'YOUR_ETH_ADDRESS',
            'value' => 'TRANSACTION_VALUE'
        ], function ($err, $result) {
            if ($err !== null) {
                echo 'Hata: ' . $err->getMessage();
                return;
            }
            echo 'İşlem Gerçekleşti: ' . $result;
        });
    }
}
?>
