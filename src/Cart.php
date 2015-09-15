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

        if (count($this->collection) == 2) {
            return $sum * 0.95;
        }
        return $sum;
    }

    public function count()
    {
        return count($this->collection);
    }
}