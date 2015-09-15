<?php
class Cart
{
    private $collection;

    public function __construct($product)
    {
        $this->collection[] = $product;
    }

    public function checkout()
    {
        return 100;
    }

    public function count()
    {
        return count($this->collection);
    }
}