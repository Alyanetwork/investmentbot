<?php

require 'vendor/autoload.php';

use Web3\Web3;

class BlockchainAuth
{
    private $web3;

    public function __construct()
    {
        $this->web3 = new Web3('https://rinkeby.infura.io/v3/YOUR_INFURA_PROJECT_ID');
    }

    public function verifyWallet($userWalletAddress)
    {
        // Cüzdan adresinin geçerliliğini kontrol eder
        return preg_match('/^0x[a-fA-F0-9]{40}$/', $userWalletAddress);
    }
}
?>
