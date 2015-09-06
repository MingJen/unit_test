<?php
class AuthenticationServiceTest extends PHPUnit_Framework_TestCase
{
    public function testIsValidTest()
    {
        $stubProfile = $this->getMockBuilder('IProfileDao')
                            ->getMock();
        $stubProfile->method('GetPassword')
                     ->willReturn('91');

        $stubToken = $this->getMockBuilder('IToken')
                            ->getMock();
        $stubToken->method('GetRandom')
                    ->willReturn('000000');


        $target = new AuthenticationService($stubProfile, $stubToken);

        $actual = $target->IsValid("joey", "91000000");

        $this->assertTrue($actual);

    }
}
