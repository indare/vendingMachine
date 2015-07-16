<?php

namespace VendingBundle\Money\Box;

interface BoxInterface
{
    /**
     * @param int $money
     */
    public function addMoney($money);

    /**
     * @return int
     */
    public function showAmount();

    /**
     * @return int
     */
    public function refundMoney();
}