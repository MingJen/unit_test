<?php

class Cart implements Countable
{
    private $collection;

    public function addItem($product)
    {
        if (is_array($product)) {
            return array_map(array($this,"addItem"), $product);
        }

        $this->collection[] = $product;
    }

    public function count()
    {
        return count($this->collection);
    }

    public function checkout()
    {
        $group = array();
        foreach ($this->collection as $key => $product) {
            $qty = $product->getQty();
            for ($i=1; $i <= $qty; $i++) {
                $group[$i][] = $product->getPrice();
            }
        }

        $result = 0;
        foreach ($group as $key => $items) {
            $result+= array_sum($items) * $this->getDiscount(count($items));
        }

        return $result;
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
