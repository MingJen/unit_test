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
        $group = array();
        foreach ($this->collection as $key => $product) {
            for ($i=1; $i <= $product->getQty(); $i++) {
                $group[$i][] = $product->getPrice();
            }
        }

        $result = 0;
        foreach ($group as $key => $items) {
            $result += array_sum($items) * $this->getDiscount(count($items));
        }

        return $result;
    }

    public function count()
    {
        return count($this->collection);
    }

    private function getDiscount($totalKind)
    {
        if ($totalKind == 2) {
            return 0.95;
        }

        if ($totalKind == 3) {
            return 0.9;
        }

        if ($totalKind == 4) {
            return 0.8;
        }

        if ($totalKind == 5) {
            return 0.75;
        }

        return 1;
    }
}