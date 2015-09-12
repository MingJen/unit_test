<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Product;
class CalcGroupSpec extends ObjectBehavior
{

    function it_can_get_sum_by_group()
    {
        $data = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', );
        $this->sumGroup($data, 3)->shouldReturn('6,15,24,21');
    }

    function it_can_store_product(Product $product)
    {
        $this->addProduct($product);

        $this->getProductQty()->shouldReturn(1);
    }

    function it_can_store_multi_product(Product $product)
    {
        $this->addProduct([$product,$product]);

        $this->getProductQty()->shouldReturn(2);
    }

    function it_can_get_sum_product_by_group(Product $product1, Product $product2, Product $product3, Product $product4, Product $product5, Product $product6, Product $product7, Product $product8, Product $product9, Product $product10, Product $product11)
    {
        $product1->getCost()->willReturn(1);
        $product2->getCost()->willReturn(2);
        $product3->getCost()->willReturn(3);
        $product4->getCost()->willReturn(4);
        $product5->getCost()->willReturn(5);
        $product6->getCost()->willReturn(6);
        $product7->getCost()->willReturn(7);
        $product8->getCost()->willReturn(8);
        $product9->getCost()->willReturn(9);
        $product10->getCost()->willReturn(10);
        $product11->getCost()->willReturn(11);

        $this->addProduct([$product1,$product2,$product3,$product4,$product5,$product6,$product7,$product8,$product9,$product10,$product11]);

        $this->getSum(3, 'Cost')->shouldReturn('6,15,24,21');
    }

    function it_can_get_revenue_sum_by_group(Product $product1, Product $product2, Product $product3, Product $product4, Product $product5, Product $product6, Product $product7, Product $product8, Product $product9, Product $product10, Product $product11)
    {
        $product1->getRevenue()->willReturn(11);
        $product2->getRevenue()->willReturn(12);
        $product3->getRevenue()->willReturn(13);
        $product4->getRevenue()->willReturn(14);
        $product5->getRevenue()->willReturn(15);
        $product6->getRevenue()->willReturn(16);
        $product7->getRevenue()->willReturn(17);
        $product8->getRevenue()->willReturn(18);
        $product9->getRevenue()->willReturn(19);
        $product10->getRevenue()->willReturn(20);
        $product11->getRevenue()->willReturn(21);

        $this->addProduct([$product1,$product2,$product3,$product4,$product5,$product6,$product7,$product8,$product9,$product10,$product11]);

        $this->getSum(4, 'Revenue')->shouldReturn('50,66,60');
    }
}
