<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IProfileDao;
use IToken;

class AuthenticationServiceSpec extends ObjectBehavior
{
    function let(IProfileDao $stubProfile, IToken $stubToken)
    {
        $stubProfile->GetPassword('joey')->willReturn('91');
        $stubToken->GetRandom('joey')->willReturn('000000');
        $this->beConstructedWith($stubProfile, $stubToken);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AuthenticationService');
    }

    function it_can_valid_account_password()
    {
        $this->IsValid("joey", "91000000")->shouldReturn(true);
    }
}
