<?php

namespace Indare\VendingBundle\Test;

use Indare\VendingBundle\MoneyValidator;

class MoneyValidatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MoneyValidator
     */
    private $moneyVaidator;

    /**
     * @setup
     */
    public function setup()
    {
        $this->moneyVaidator = new MoneyValidator();
    }

    /**
     * @test
     * @dataProvider actualMoneyList
     * @param $actualMoney
     * @param $actualResult
     */
    public function 投入可能なお金判定のテスト($actualMoney, $actualResult)
    {
        $moneyVaildator = new MoneyValidator();
        $result = $moneyVaildator->checkMoney($actualMoney);
        $this->assertEquals($result, $actualResult);

    }

    /**
     * @return array
     */
    public function actualMoneyList()
    {
        return [
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
