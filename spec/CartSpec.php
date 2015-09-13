<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Product;

class CartSpec extends ObjectBehavior
{
    //設定Stub
    function let(Product $product1, Product $product2, Product $product3, Product $product4, Product $product5)
    {
        $product1->getPrice()->willReturn((double)100);
        $product1->getQty()->willReturn(1);
        $product2->getPrice()->willReturn((double)100);
        $product2->getQty()->willReturn(1);
        $product3->getPrice()->willReturn((double)100);
        $product3->getQty()->willReturn(1);
        $product4->getPrice()->willReturn((double)100);
        $product4->getQty()->willReturn(1);
        $product5->getPrice()->willReturn((double)100);
        $product5->getQty()->willReturn(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Cart');
    }

    function it_can_add_item_to_cart($product1, $product2)
    {
        $this->addItem([$product1, $product2]);
        $this->shouldHaveCount(2);
    }

    function it_第一集買了一本，其他都沒買，不打折_return_100($product1)
    {
        $this->addItem($product1);

        $this->checkout()->shouldReturn((double)100);
    }

    function it_第一集買了一本，第二集也買了一本_95折_return_190($product1, $product2)
    {

        $this->addItem([$product1, $product2]);

        $this->checkout()->shouldReturn((double)190);
    }

    function it_一二三集各買了一本_9折_return_270( $product1, $product2, $product3)
    {

        $this->addItem([$product1, $product2, $product3]);

        $this->checkout()->shouldReturn((double)270);
    }

    function it_一二三四集各買了一本_8折_return_320($product1, $product2, $product3, $product4)
    {

        $this->addItem([$product1, $product2, $product3, $product4]);

        $this->checkout()->shouldReturn((double)320);
    }

    function it_一次買了整套，一二三四五集各買了一本_75折_return_375($product1, $product2, $product3, $product4, $product5)
    {

        $this->addItem([$product1, $product2, $product3, $product4, $product5]);

        $this->checkout()->shouldReturn((double)375);
    }

    function it_一二集各買了一本，第三集買了兩本_分兩組_9折和不打折_return_370($product1, $product2, $product3)
    {
        $product3->getQty()->willReturn(2);
        $this->addItem([$product1, $product2, $product3]);

        $this->checkout()->shouldReturn((double)370);
    }

    function it_第一集買了一本，第二三集各買了兩本_分兩組_9折和95折_return_460($product1, $product2, $product3)
    {
        $product2->getQty()->willReturn(2);
        $product3->getQty()->willReturn(2);
        $this->addItem([$product1, $product2, $product3]);

        $this->checkout()->shouldReturn((double)460);
    }

}
