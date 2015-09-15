<?php
class CartTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->stubProduct1 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct1->method('getPrice')
             ->willReturn(100);

        $this->stubProduct2 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct2->method('getPrice')
             ->willReturn(100);

        $this->stubProduct3 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct3->method('getPrice')
             ->willReturn(100);
    }

    public function test可以將商品放入購物車()
    {

        $target = new Cart([$this->stubProduct1, $this->stubProduct2]);

        $actual = $target->count();

        $this->assertEquals(2, $actual);
    }

    public function test第一集買了一本，其他都沒買，價格應為100X1()
    {
        $stubProduct = $this->getMockBuilder('Product')
            ->getMock();

        $stubProduct->method('getPrice')
             ->willReturn(100);


        $target = new Cart($this->stubProduct1);

        $actual = $target->checkout();

        $this->assertEquals(100, $actual);

    }

    public function test第一集買了一本，第二集也買了一本，95折，共190()
    {

        $target = new Cart([$this->stubProduct1, $this->stubProduct2]);

        $actual = $target->checkout();

        $this->assertEquals(190, $actual);
    }

    public function test一二三集各買了一本，9折_共270()
    {

        $target = new Cart([$this->stubProduct1, $this->stubProduct2, $this->stubProduct3]);

        $actual = $target->checkout();

        $this->assertEquals(270, $actual);
    }
}
