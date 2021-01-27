<?php

namespace JWTools;

use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

class JWToolsCfg{
    public static $issuedBy = "17486341@qq.com";
    public static $permittedFor = "";


    public static $base64 = "X19NakF5TVM4eEx6RTVMMWx2ZFNkeVpTQm9ZWEJ3ZVNCMGJ5Qm1hWEpsSUcxbElEOD0=";
    public static $now;
    public static $id = 0;
    public static $expiredDay = "37";


    public static function getConfig()
    {
        $configuration = Configuration::forSymmetricSigner(
        // You may use any HMAC variations (256, 384, and 512)
            new Sha256(),
            // replace the value below with a key of your own!
            InMemory::base64Encoded(self::$base64)
        // You may also override the JOSE encoder/decoder if needed by providing extra arguments here
        );
        return $configuration;
    }

    public static function getNow()
    {
        if (!isset(self::$now)) {
            self::$now = new \DateTimeImmutable();
        }
        return self::$now;
    }

    public static function setExpiresAt($day)
    {
        self::$expiredDay = $day;
    }

    public static function getExpiresAt()
    {
        return self::getNow()->modify("+" . static::$expiredDay . " day");
    }

}