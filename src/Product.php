<?php

class Product
{
    private $id;
    private $cost;
    private $revenue;
    private $sellPrice;

    public function __construct($id, $cost, $revenue, $sellPrice)
    {
        $this->id = $id;
        $this->cost = $cost;
        $this->revenue = $revenue;
        $this->sellPrice = $sellPrice;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getRevenue()
    {
        return $this->revenue;
    }

    public function getSellPrice()
    {
        return $this->sellPrice;
    }

}
