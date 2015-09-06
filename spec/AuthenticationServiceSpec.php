<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IProfileDao;
use IToken;

class AuthenticationServiceSpec extends ObjectBehavior
{
    function let()
    {
        $stubProfile = new StubProfileDao();
        $stubToken = new StubTokenDao();
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