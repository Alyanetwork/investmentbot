<?php

class CryptoSigner
{
    private $privateKey;

    public function __construct($privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function sign($data)
    {
        openssl_sign($data, $signature, $this->privateKey, OPENSSL_ALGO_SHA256);
        return base64_encode($signature);
    }

    public function verify($data, $signature, $publicKey)
    {
        $decodedSignature = base64_decode($signature);
        return openssl_verify($data, $decodedSignature, $publicKey, OPENSSL_ALGO_SHA256) === 1;
    }
}
?>
