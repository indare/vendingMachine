<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:05
 */

namespace VendingBundle;


class VendingMachine {

    private $stockPrice;

    /**
     * VendingMachine constructor.
     */
    public function __construct()
    {
        $this->stockPrice = 0;
    }


    public function getName()
    {
        return 'VendingMachine';
    }


    /**
     * @param int $money
     * @return int
     */
    public function receiveMoney($money)
    {
        if (!is_int($money)){
            throw new \InvalidArgumentException("このお金は使えません。");
        }
        $this->stockPrice += $money;
        return $this->stockPrice;
    }
}