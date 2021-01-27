<?php

namespace JWTools;


use Lcobucci\JWT\Configuration;

class JWTools
{


    // -------------------------- 生成 --------------------------

    public static $claimArr = [];
    public static $headerArr = [];


    public static function setHeader($key, $value)
    {
        self::$headerArr[$key] = $value;
    }

    public static function setParam($key, $value)
    {
        self::$claimArr[$key] = $value;
    }

    public static function getToken()
    {
        $config = JWToolsCfg::getConfig();
        assert($config instanceof Configuration);

        $now = new \DateTimeImmutable();
        $obj = $config->builder()
            ->issuedBy(JWToolsCfg::$issuedBy)
            // 受众
            ->permittedFor(JWToolsCfg::$permittedFor)
            // JWT ID 编号 唯一标识
            ->identifiedBy(JWToolsCfg::$id)
            // 签发时间
            ->issuedAt(JWToolsCfg::getNow())
            // 在1分钟后才可使用
//            ->canOnlyBeUsedAfter($now->modify('+1 minute'))
            // 过期时间1小时
            ->expiresAt(JWToolsCfg::getExpiresAt());

        foreach (self::$claimArr as $name => $value) {
            $obj->withClaim($name, $value);
        }

        foreach (self::$headerArr as $k => $v) {
            $obj->withHeader($k, $v);
        }

        // 生成token
        $token = $obj->getToken($config->signer(), $config->signingKey());

        return $token->toString();
    }

    // -------------------------- 解析 --------------------------

    private static $headers;
    private static $claims;

    public static function parse($token)
    {
        try{
            $config = JWToolsCfg::getConfig();
            $par = $config->parser()->parse($token);
            self::$headers = $par->headers();
            self::$claims = $par->claims();
            return new self();
        }catch (\Exception $e){
            return null;
        }

    }

    public function getHeader($key)
    {
        return self::$headers->get($key);
    }

    public function getParam($key)
    {
        return self::$claims->get($key);
    }


}