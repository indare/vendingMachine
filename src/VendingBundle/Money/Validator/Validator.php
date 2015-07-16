<?php

namespace VendingBundle\Money\Validator;

class Validator implements ValidatorInterface
{

    const ACCEPTABLE_MONEY = [10, 50, 100, 500, 1000];

    /**
     * @inheritdoc
     */
    public function checkMoney($money)
    {
        return in_array($money, self::ACCEPTABLE_MONEY);
    }

}