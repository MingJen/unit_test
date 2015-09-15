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

    public function test第一集買了一本，其他都沒買，價格應為100X1()
    {
        $stubProduct = $this->getMockBuilder('Product')
            ->getMock();

        $stubProduct->method('getPrice')
             ->willReturn(100);


        $target = new Cart($stubProduct);

        $actual = $target->checkout();

        $this->assertEquals(100, $actual);

    }

    public function test第一集買了一本，第二集也買了一本，95折，共195()
    {
        $stubProduct = $this->getMockBuilder('Product')
            ->getMock();
        $stubProduct->method('getPrice')
             ->willReturn(100);

        $stubProduct2 = $this->getMockBuilder('Product')
            ->getMock();
        $stubProduct2->method('getPrice')
             ->willReturn(100);


        $target = new Cart([$stubProduct, $stubProduct2]);

        $actual = $target->checkout();

        $this->assertEquals(195, $actual);
    }

}
