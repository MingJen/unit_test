<?php
class ProfileDao
{
    public function GetPassword($account)
    {
        $result = Person::GetPassword($account);
        return $result;
    }
}