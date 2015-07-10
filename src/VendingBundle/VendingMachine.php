<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:05
 */

namespace VendingBundle;


class VendingMachine
{

    private $stockPrice;
    private $ejectBox;

    /**
     * VendingMachine constructor.
     */
    public function __construct()
    {
        $this->stockPrice = 0;
        $this->ejectBox = 0;
    }


    public function getName()
    {
        return 'VendingMachine';
    }

    /**
     * @return int
     */
    public function refund()
    {
        $result = $this->stockPrice;
        $this->stockPrice = 0;

        return $result;
    }

    /**
     * @return array
     */
    public function ejectBox()
    {
        return $this->ejectBox;
    }

    /**
     * @return int
     */
    public function showStockPrice()
    {
        return $this->stockPrice;
    }

    /**
     * @param int $money
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function receiveMoney($money)
    {
        if (!is_int($money)) {
            throw new \InvalidArgumentException("これはお金じゃありません。");
        }

        $moneyValidator = new MoneyValidator();

        if (!$moneyValidator->checkMoney($money)) {
            $this->ejectBox += $money;

            return false;
        } else {
            $this->stockPrice += $money;
        }

        return true;
    }
}