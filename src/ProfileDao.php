<?php
class ProfileDao implements IProfileDao
{
    public function GetPassword($account)
    {
        $result = Person::GetPassword($account);
        return $result;
    }
}