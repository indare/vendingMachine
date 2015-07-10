<?php
namespace VendingBundle;

class MoneyValidator
{

    const ACCEPTABLE_MONEY = [10, 50, 100, 500, 1000];

    public function checkMoney($money)
    {
        return in_array($money, self::ACCEPTABLE_MONEY);
    }

}