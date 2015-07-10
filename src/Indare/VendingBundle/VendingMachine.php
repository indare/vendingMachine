<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:05
 */

namespace Indare\VendingBundle;


class VendingMachine
{

    private $currentAmount;
    private $ejectBox;
    /**
     * @var Stock
     */
    private $stock;

    /**
     * VendingMachine constructor.
     */
    public function __construct()
    {
        $this->currentAmount = 0;
        $this->ejectBox = 0;
        $this->stock = new Stock();
    }

    public function showStock()
    {
        return $this->stock->getStockStatus();
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
        $result = $this->currentAmount;
        $this->currentAmount = 0;

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
    public function currentAmount()
    {
        return $this->currentAmount;
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
            $this->currentAmount += $money;
        }

        return true;
    }
}