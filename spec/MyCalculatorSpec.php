<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MyCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MyCalculator');
    }

    function it_can_add_1_and_2_return_3()
    {
        $this->add(1,2)->shouldEqual(3);
    }
}
