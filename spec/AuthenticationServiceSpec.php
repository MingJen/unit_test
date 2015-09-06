<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IProfileDao;
use IToken;
use ILog;

class AuthenticationServiceSpec extends ObjectBehavior
{
    function let(IProfileDao $stubProfile, IToken $stubToken, ILog $log)
    {
        $stubProfile->GetPassword('joey')->willReturn('91');
        $stubToken->GetRandom('joey')->willReturn('000000');
        $this->beConstructedWith($stubProfile, $stubToken, $log);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AuthenticationService');
    }

    function it_can_valid_account_password()
    {
        $this->IsValid("joey", "91000000")->shouldReturn(true);
    }

    function it_can_logged_when_password_error(ILog $log)
    {
        $log->Save('account:joey try to login failed')->shouldBeCalled();
        $this->IsValid("joey", "wrong number");

    }
}
