<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('1','11','22','33');
        $this->shouldHaveType('Product');
    }
}
