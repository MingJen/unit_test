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
        $sum = 0;
        foreach ($this->collection as $product) {
            $sum += $product->getPrice();
        }

        return $sum;
    }

    public function count()
    {
        return count($this->collection);
    }
}