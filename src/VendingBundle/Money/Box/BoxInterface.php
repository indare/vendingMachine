<?php

namespace VendingBundle\Money\Box;

interface BoxInterface
{
    /**
     * @param int $money
     * @return void
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