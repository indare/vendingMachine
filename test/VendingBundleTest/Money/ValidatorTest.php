<?php

namespace VendingBundleTest\Money;

use CommonTestBundle\UnitTestBaseClass;
use VendingBundle\Money\Validator\Validator;
use VendingBundle\Money\Validator\ValidatorInterface;

class MoneyValidatorTest extends UnitTestBaseClass
{

    /**
     * @var ValidatorInterface
     */
    private $moneyValidator;

    /**
     * @setup
     */
    public function setup()
    {
        parent::setup();
        $this->moneyValidator = $this->container['class.validator'];
    }

    /**
     * @test
     * @dataProvider actualMoneyList
     * @param $actualMoney
     * @param $actualResult
     */
    public function 投入可能なお金判定のテスト($actualMoney, $actualResult)
    {
        $moneyValidator = new Validator();
        $result = $moneyValidator->checkMoney($actualMoney);
        $this->assertEquals($result, $actualResult);

    }

    /**
     * @return array
     */
    public function actualMoneyList()
    {
        return [
            [-1, false],
            [0, false],
            [1, false],
            [5, false],
            [10, true],
            [50, true],
            [100, true],
            [500, true],
            [1000, true],
            [2000, false],
            [5000, false],
            [10000, false]
        ];
    }
}
