<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/16
 * Time: 14:21
 */
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