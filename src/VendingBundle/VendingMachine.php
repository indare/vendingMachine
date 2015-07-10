<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:05
 */

namespace VendingBundle;


class VendingMachine
{

    private $stockPrice;

    /** @var EjectBox */
    private $ejectBox;

    /**
     * VendingMachine constructor.
     */
    public function __construct()
    {
        $this->stockPrice = 0;
        $this->ejectBox = new EjectBox();
    }


    public function getName()
    {
        return 'VendingMachine';
    }

    public function refund()
    {
        $result = $this->stockPrice;
        $this->stockPrice = 0;

        return $result;
    }

    /**
     * @return array
     */
    public function checkEjectBox()
    {
        return $this->ejectBox->getContain();
    }

    public function getStockPrice()
    {
        return $this->stockPrice;
    }

    /**
     * @param int $money
     * @return bool
     */
    public function receiveMoney($money)
    {
        if (!is_int($money)) {
            throw new \InvalidArgumentException("これはお金じゃありません。");
        }

        $moneyValidator = new MoneyValidator();

        if (!$moneyValidator->checkMoney($money)) {
            $this->ejectBox->setContain($money);

            return false;
        } else {
            $this->stockPrice += $money;
        }

        return true;
    }
}