<?php

namespace Ammadeuss\LaravelJwt;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer;

class Jwt
{
    private $obj;

    public function __construct($object)
    {
        $this->obj = $object;
    }

    public function __call($method, $arguments)
    {
        $this->obj = call_user_func_array([$this->obj, $method], $arguments);
        return $this;
    }

    public function __toString()
    {
        return (string) $this->obj;
    }

    public static function generate($signer = NULL)
    {
        return new self(new Builder);
    }

    public static function parse($token)
    {
        return (new Parser())->parse((string) $token);
    }

    public static function validate($token, $data)
    {
        $data = new ValidationData;

        foreach($data as $k => $v) {
            if (method_exists($data, 'set'.ucfirst($k))) {
                call_user_func_array([$data, 'set'.ucfirst($k)], [$v]);
            }
        }

        return $token->validate($data);
    }

    public function sign($signer = NULL)
    {
        if ($signer === NULL) {
            $signer = new \Lcobucci\JWT\Signer\Hmac\Sha256;
            $key = config('app.key');
        } elseif (is_string($signer)) {
            $signer = new \Lcobucci\JWT\Signer\Hmac\Sha256;
            $key = $signer;
        } elseif (is_array($signer) && isset($signer['key'])) {
            $key = $signer['key'];
        }
        $this->obj = $this->obj->sign($signer, $key);
        return $this;
    }
}
