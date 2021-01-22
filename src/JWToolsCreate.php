<?php


namespace JWTools;

use Lcobucci\JWT\Configuration;

class JWToolsCreate extends JWToolsCfg
{

    public static function gen($claimArr = [], $headerArr = [])
    {
        $config = static::getConfig();
        assert($config instanceof Configuration);

        $now = new \DateTimeImmutable();
        $obj = $config->builder()
            ->issuedBy(static::$issuedBy)
            // 受众
            ->permittedFor(static::$permittedFor)
            // JWT ID 编号 唯一标识
            ->identifiedBy(static::$id)
            // 签发时间
            ->issuedAt(static::getNow())
            // 在1分钟后才可使用
//            ->canOnlyBeUsedAfter($now->modify('+1 minute'))
            // 过期时间1小时
            ->expiresAt(static::getExpiresAt());

        foreach ($claimArr as $name => $value) {
            $obj->withClaim($name, $value);
        }

        foreach ($headerArr as $k => $v) {
            $obj->withHeader($k, $v);
        }

        // 生成token
        $token = $obj->getToken($config->signer(), $config->signingKey());

        return $token->toString();
    }

}