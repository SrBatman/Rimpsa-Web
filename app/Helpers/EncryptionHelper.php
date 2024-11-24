<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Crypt;

class EncryptionHelper
{
    private static function getCipherKey()
    {
        return base64_decode(env('CIPHER_SECRET_KEY'));
    }

    private static function getIv()
    {
        return base64_decode(env('CIPHER_IV'));
    }

    public static function encryptData($data)
    {
        $cipher = 'aes-256-cbc';
        $key = self::getCipherKey();
        $iv = self::getIv();

        return base64_encode(openssl_encrypt(json_encode($data), $cipher, $key, 0, $iv));
    }

    public static function decryptData($encryptedData)
    {
        $cipher = 'aes-256-cbc';
        $key = self::getCipherKey();
        $iv = self::getIv();
    
        // Verifica que los datos sean una cadena base64 válida
        if (base64_encode(base64_decode($encryptedData, true)) !== $encryptedData) {
            dd('El dato no es una cadena base64 válida.');
        }
    
        $decrypted = openssl_decrypt(base64_decode($encryptedData), $cipher, $key, 0, $iv);
    
        // Si la desencriptación falla, devuelve null
        if ($decrypted === false) {
            dd('Desencriptación fallida.');
        }
    
        return json_decode($decrypted, true);
    }
}