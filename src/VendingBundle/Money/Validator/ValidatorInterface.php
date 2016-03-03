<?php

namespace VendingBundle\Money\Validator;

interface ValidatorInterface
{
    /**
     * @param int $money
     * @return bool
     */
    public function isMoney($money);
}