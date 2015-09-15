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
        $no_discount = 0;
        $no_discount_kind = 0;

        foreach ($this->collection as $product) {
            $sum += $product->getPrice();
            if ($product->getQty() == 2) {
                $no_discount+= $product->getPrice();
                $no_discount_kind += 1;
            }
        }

        return $sum * $this->getDiscount(count($this->collection)) + $no_discount * $this->getDiscount($no_discount_kind);
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