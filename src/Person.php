<?php

class Person
{

    public static function GetPassword($key)
    {
        $profiles = [
            'joey' => '91',
            'mei' => '99'
        ];
        return $profiles[$key];
    }
}