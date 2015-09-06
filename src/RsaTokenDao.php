<?php

class RsaTokenDao implements IToken
{
    public function GetRandom($account)
    {
        $seed = rand(0,999999);
        return sprintf("%06d", $seed);
    }
}
