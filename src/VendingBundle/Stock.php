<?php

namespace VendingBundle;

class Stock
{

    /**
     * @var array
     */
    private $currentStock;

    /**
     * Stock constructor.
     * @param array $stockList
     */
    public function __construct(Array $stockList)
    {
        $this->currentStock = $stockList;
    }

    /**
     * @return array
     */
    public function getStockStatus()
    {
        return $this->currentStock;
    }
}