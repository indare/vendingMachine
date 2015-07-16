<?php

namespace VendingBundle\Money\Box;

class Box implements BoxInterface
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @inheritdoc
     */
    public function addMoney($money)
    {
        $this->amount += $money;
    }

    /**
     * @inheritdoc
     */
    public function showAmount()
    {
        return $this->amount;
    }

    /**
     * @inheritdoc
     */
    public function refundMoney()
    {
        $result = $this->amount;
        $this->amount = 0;

        return $result;

    }
}