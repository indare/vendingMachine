<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 23:57
 */

namespace Indare\VendingBundle;


class MoneyBox
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @param int $money
     */
    public function addMoney($money)
    {
        $this->amount += $money;
    }

    /**
     * @return int
     */
    public function showAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function refundMoney()
    {
        $result = $this->amount;
        $this->amount = 0;
        return $result;

    }
}