<?php
class CartTest extends PHPUnit_Framework_TestCase
{
    public function test第一集買了一本，其他都沒買，價格應為100X1()
    {
        $target = new Cart();

        $actual = $target->checkout();

        $this->assertEquals(100, $actual);

    }
}
