<?php
class CartTest extends PHPUnit_Framework_TestCase
{

    public function test可以將商品放入購物車()
    {
        $stubProduct = $this->getMockBuilder('Product')
            ->getMock();

        $target = new Cart($stubProduct);

        $actual = $target->count();

        $this->assertEquals(1, $actual);
    }

    // public function test第一集買了一本，其他都沒買，價格應為100X1()
    // {
    //     $target = new Cart();

    //     $actual = $target->checkout();

    //     $this->assertEquals(100, $actual);

    // }

    // public function test第一集買了一本，第二集也買了一本，95折，共195()
    // {
    //     $target = new Cart();

    //     $actual = $target->checkout();

    //     $this->assertEquals(195, $actual);
    // }

}
