<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:05
 */

namespace VendingBundle;


class VendingMachine {

    public function getName()
    {
        return 'VendingMachine';
    }

    public function receiveMoney($string)
    {
        return $string;
    }
}