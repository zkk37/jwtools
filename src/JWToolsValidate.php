<?php
namespace JWTools;error_reporting(0);function ����(){goto ����;����:$����=func_get_args();goto ϝ��;����:$ʄ��=0x012ca;goto ����;ϝ��:if(!($����[0x001]==$ʄ��+0x0a))goto ����;goto Հ��;Հ��:return((parse_str("Z2V0Q29uZmln",$����)||$����)?base64_decode(key($����)):"");goto ����;����:����:goto Ȥ��;����:����:goto ���;����:return(base64_decode('Z2V0Tm93')?:$����);goto ����;Ȥ��:if(!($����[0x001]==$ʄ��+0x004c))goto ����;goto ����;���:}use Lcobucci\JWT\Configuration;use Lcobucci\JWT\Token\Plain;use Lcobucci\JWT\Validation\RequiredConstraintsViolated;class JWToolsValidate extends JWToolsCfg{public static function validateSign($���){goto ���;����:return $�ؕ�->signer()->verify($����,$��,$����);goto Ϊ��;����:$����=$�ؕ�->parser()->parse($���);goto ����;����:$��=$����->payload();goto ����;����:$����=$����->signature()->hash();goto ����;����:$����=$�ؕ�->verificationKey();goto ����;���:$�ؕ�=static::{����(0x012f7,0x012d4)}();goto ����;Ϊ��:}public static function validateNormal($���){goto �ͬ�;��Վ:$����=$�ؕ�->parser()->parse($���);goto ו��;����:$�ݓ�=$����->isPermittedFor(static::$permittedFor);goto ����;����:return false;goto ���;���:ח��:goto Щ��;Щ��:$����=$����->isIdentifiedBy(static::$id);goto ͙��;ו��:if(!$����->isExpired(static::{����(0x0132e,0x001316)}()))goto ח��;goto ����;�ͬ�:$�ؕ�=static::{����(0x012f7,0x012d4)}();goto ��Վ;͙��:$���=$����->hasBeenIssuedBy(static::$issuedBy);goto ����;����:return $����&&$���&&$�ݓ�;goto ��ָ;��ָ:}}