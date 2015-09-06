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

        $stubLog = $this->getMockBuilder('ILog')
                            ->getMock();

        $target = new AuthenticationService($stubProfile, $stubToken, $stubLog);

        $actual = $target->IsValid("joey", "91000000");

        $this->assertTrue($actual);

    }

    public function testIsValidTest_如何驗證當非法登入時有正確紀錄log()
    {

        $stubProfile = $this->getMockBuilder('IProfileDao')
                    ->getMock();
        $stubProfile->method('GetPassword')
                    ->willReturn('91');

        $stubToken = $this->getMockBuilder('IToken')
                    ->getMock();
        $stubToken->method('GetRandom')
                    ->willReturn('000000');

        $stubLog = $this->getMockBuilder('ILog')
                    ->setMethods(array('Save'))
                    ->getMock();

        $stubLog->expects($this->once())
                ->method('Save')
                ->with($this->stringContains('joey'));

        $target = new AuthenticationService($stubProfile, $stubToken, $stubLog);

        $actual = $target->IsValid("joey", "wrong number");

    }
}
