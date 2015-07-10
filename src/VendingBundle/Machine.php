<?php
namespace VendingBundle;


class Machine
{

    /** @var MoneyBox */
    private $moneyBox;
    private $ejectBox;
    /**
     * @var Stock
     */
    private $stock;

    /**
     * VendingMachine constructor.
     */
    public function __construct()
    {
        $this->moneyBox = new MoneyBox();
        $this->ejectBox = 0;
        $this->stock = new Stock();
    }

    public function showStock()
    {
        return $this->stock->getStockStatus();
    }

    public function getName()
    {
        return 'VendingMachine';
    }

    /**
     * @return int
     */
    public function refund()
    {
        return $this->moneyBox->refundMoney();
    }

    /**
     * @return array
     */
    public function ejectBox()
    {
        return $this->ejectBox;
    }

    /**
     * @return int
     */
    public function currentAmount()
    {
        return $this->moneyBox->showAmount();
    }

    /**
     * @param int $money
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function receiveMoney($money)
    {
        if (!is_int($money)) {
            throw new \InvalidArgumentException("これはお金じゃありません。");
        }

        $moneyValidator = new MoneyValidator();

        if (!$moneyValidator->checkMoney($money)) {
            $this->ejectBox += $money;

            return false;
        } else {
            $this->moneyBox->addMoney($money);
        }

        return true;
    }
}