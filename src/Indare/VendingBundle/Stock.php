<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 22:57
 */

namespace Indare\VendingBundle;


use Indare\VendingBundle\Entity\Coke;

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