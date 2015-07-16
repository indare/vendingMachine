<?php

namespace VendingBundle;

use VendingBundle\Entity\Coke;

class Stock
{

    /**
     * @var array
     */
    private $currentStock;

    /**
     * Stock constructor.
     */
    public function __construct()
    {
        $this->currentStock = [new Coke()];
    }

    /**
     * @return array
     */
    public function getStockStatus()
    {
        return $this->currentStock;
    }
}