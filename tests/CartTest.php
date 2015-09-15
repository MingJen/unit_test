<?php
class CartTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->stubProduct1 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct1->method('getPrice')
             ->willReturn(100);
        $this->stubProduct1->method('getQty')
             ->willReturn(1);

        $this->stubProduct2 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct2->method('getPrice')
             ->willReturn(100);
        $this->stubProduct2->method('getQty')
             ->willReturn(1);

        $this->stubProduct3 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct3->method('getPrice')
             ->willReturn(100);
        $this->stubProduct3->method('getQty')
             ->willReturn(1);

        $this->stubProduct4 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct4->method('getPrice')
             ->willReturn(100);
        $this->stubProduct4->method('getQty')
             ->willReturn(1);

        $this->stubProduct5 = $this->getMockBuilder('Product')
            ->getMock();
        $this->stubProduct5->method('getPrice')
             ->willReturn(100);
        $this->stubProduct5->method('getQty')
             ->willReturn(1);
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

    public function test_一二三四集各買了一本，_8折_共320()
    {
        $target = new Cart([$this->stubProduct1, $this->stubProduct2, $this->stubProduct3, $this->stubProduct4]);

        $actual = $target->checkout();

        $this->assertEquals(320, $actual);
    }

    public function test_一次買了整套，一二三四五集各買了一本，75折，共375()
    {
        $target = new Cart([$this->stubProduct1, $this->stubProduct2, $this->stubProduct3, $this->stubProduct4, $this->stubProduct5]);

        $actual = $target->checkout();

        $this->assertEquals(375, $actual);
    }

    // public function test_一二集各買了一本，第三集買了兩本，價格應為100乘3再打9折，加100，共370()
    // {
    //     $target = new Cart([$this->stubProduct1, $this->stubProduct2, $this->stubProduct3]);

    //     $actual = $target->checkout();

    //     $this->assertEquals(370, $actual);
    // }
}
