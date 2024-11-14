<?php

require 'vendor/autoload.php';

use kornrunner\Keccak;
use Elliptic\EC;

class WalletAuth
{
    public static function verifySignature($address, $message, $signature)
    {
        $msgHash = self::hashMessage($message);
        $sig = [
            "r" => substr($signature, 2, 64),
            "s" => substr($signature, 66, 64),
            "v" => hexdec(substr($signature, 130, 2))
        ];

        $ec = new EC('secp256k1');
        $publicKey = $ec->recoverPubKey($msgHash, $sig, $sig['v']);

        // Adresin doğruluğunu kontrol et
        $recoveredAddress = "0x" . substr(Keccak::hash(substr(hex2bin($publicKey->encode("hex")), 1), 256), 24);
        return strtolower($recoveredAddress) === strtolower($address);
    }

    private static function hashMessage($message)
    {
        $prefix = "\x19Ethereum Signed Message:\n" . strlen($message);
        return Keccak::hash($prefix . $message, 256);
    }
}
