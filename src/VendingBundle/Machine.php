<?php
namespace VendingBundle;


use Pimple\Container;
use VendingBundle\Money\Box\BoxInterface;
use VendingBundle\Money\Validator\ValidatorInterface;

class Machine
{

    /** @var BoxInterface */
    private $moneyBox;
    /** @var Lane */
    private $stock;
    /** @var ValidatorInterface */
    private $validator;

    /**
     * VendingMachine constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->moneyBox = $container['class.box'];
        $this->validator = $container['class.validator'];
        $this->stock = $container['lane'];
    }

    /**
     * @return Lane
     */
    public function showStock()
    {
        return $this->stock;
    }

    /**
     * @return int
     */
    public function refund()
    {
        return $this->moneyBox->refundMoney();
    }

    /**
     * @return int
     */
    public function showAmount()
    {
        return $this->moneyBox->showAmount();
    }

    /**
     * @param int $money
     * @return int
     * @throws \InvalidArgumentException
     */
    public function receiveMoney($money)
    {
        if (!is_int($money)) {
            throw new \InvalidArgumentException('これはお金じゃありません。');
        }

        if (!$this->validator->isMoney($money)) {
            return $money;
        } else {
            $this->moneyBox->addMoney($money);
        }

        return 0;
    }
}