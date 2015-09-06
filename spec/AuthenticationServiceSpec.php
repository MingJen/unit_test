<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthenticationServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AuthenticationService');
    }

    function it_can_valid_account_password()
    {
        $this->IsValid("joey", "91000000")->shouldReturn(true);
    }
}
