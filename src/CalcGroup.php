<?php

class CalcGroup
{

    public function sumGroup($data, $size)
    {
        $group = array_chunk($data, $size);

        $result = [];
        while ($chunk = array_shift($group)) {
            $result[] = array_sum($chunk);
        }

        return implode(",", $result);
    }


    public function addProduct($product)
    {
        if (is_array($product)) {
            return array_map([$this,__FUNCTION__], $product);
        }
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getProductQty()
    {
        return count($this->products);
    }

    public function getSum($group, $name)
    {
        $group = array_chunk($this->products, $group);

        $result = [];
        while ($chunk = array_shift($group)) {
            $sum = 0;
            foreach ($chunk as $product) {
                $sum += call_user_func([$product,'get'.$name]);
            }

            $result[] = $sum;
        }

        return implode(",", $result);
    }
}
