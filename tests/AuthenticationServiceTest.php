<?php
class AuthenticationServiceTest extends PHPUnit_Framework_TestCase
{
    public function testIsValidTest()
    {
        $target = new AuthenticationService();

        $actual = $target->IsValid("joey", "91000000");

        $this->assertTrue($actual);

    }
}