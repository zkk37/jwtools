<?php


namespace JWTools;


use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

class JWToolsCfg
{

    public static $issuedBy = "17486341@qq.com";
    public static $permittedFor = "";


    protected static $base64 = "X19NakF5TVM4eEx6RTVMMWx2ZFNkeVpTQm9ZWEJ3ZVNCMGJ5Qm1hWEpsSUcxbElEOD0=";
    protected static $now;
    protected static $id = 0;
    protected static $expiredDay = "37";

    public static function setCfg($base64)
    {
        self::$base64 = $base64;
    }

    public static function setId($id)
    {
        return self::$id = $id;
    }

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

    protected static function getExpiresAt()
    {
        return self::getNow()->modify("+" . static::$expiredDay . " day");
    }


}