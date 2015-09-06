<?php
class AuthenticationServiceTest extends PHPUnit_Framework_TestCase
{
    public function testIsValidTest()
    {
        $stubProfile = new StubProfileDao();
        $stubToken = new StubTokenDao();

        $target = new AuthenticationService($stubProfile, $stubToken);

        $actual = $target->IsValid("joey", "91000000");

        $this->assertTrue($actual);

    }
}

class StubTokenDao implements IToken
{
    public function GetRandom($account){
        return '000000';
    }
}

class StubProfileDao implements IProfileDao
{
    public function GetPassword($account)
    {
        return '91';
    }
}
