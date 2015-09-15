<?php
class Cart
{
    private $collection;

    public function __construct($product)
    {
        if (is_array($product)) {
            return array_map([$this, __FUNCTION__], $product);
        }
        $this->collection[] = $product;
    }

    public function checkout()
    {
        $sum = 0;
        foreach ($this->collection as $product) {
            $sum += $product->getPrice();
        }

        return $sum * $this->getDiscount();
    }

    public function count()
    {
        return count($this->collection);
    }

    private function getDiscount()
    {
        if (count($this->collection) == 2) {
            return 0.95;
        }

        if (count($this->collection) == 3) {
            return 0.9;
        }

        return 1;
    }
}