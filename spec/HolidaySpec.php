<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use DateTime;

class HolidaySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Holiday');
    }

    function it_can_return_MerryXmas_when_Xmas()
    {

        $expected = "Merry Xmas!!";

        $this->setToday(new DateTime('2015-12-25'));
        // 請想辦法通過測試，今天是聖誕節的情境
        $this->IsTodayXmas()->shouldBeLike($expected);
    }

    function it_can_return_NotXmas_when_not_Xmas()
    {

        $expected = "Today is not Xmas";

        $this->IsTodayXmas()->shouldBeLike($expected);
    }

}
