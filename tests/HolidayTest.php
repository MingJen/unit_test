<?php
class HolidayTest extends PHPUnit_Framework_TestCase
{
    public function testIsTodayXmasTest_假如今天是聖誕節_應回傳MerryXmas()
    {
        $holiday = new Holiday();
        $holiday->setToday(new DateTime('2015-12-25'));

        $expected = "Merry Xmas!!";

        $actual = $holiday->IsTodayXmas();

        // 請想辦法通過測試，今天是聖誕節的情境
        $this->assertEquals($expected, $actual);
    }

    public function testIsTodayXmasTest_假如今天不是聖誕節_應回傳Today_is_not_Xmas()
    {
        $holiday = new Holiday();

        $expected = "Today is not Xmas";

        $actual = $holiday->IsTodayXmas();

        $this->assertEquals($expected, $actual);

    }
}
