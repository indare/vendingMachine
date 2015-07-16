<?php

namespace AcceptanceBundle;

use VendingBundle\Machine;

class Step0Test extends \PHPUnit_Framework_TestCase
{
    /** @var Machine */
    private $machine;

    /** @setup */
    public function setup()
    {
        $this->machine = new Machine();
    }

    /**
     * @test
     * @dataProvider acceptMoneyList
     * @param int $moneyType
     * @param int $amount
     */
    public function 投入できる($moneyType, $amount)
    {
        while ($amount == 0) {
            $this->assertTrue($this->machine->receiveMoney($moneyType));
        }
    }

    /** 10円玉、50円玉、100円玉、500円玉、1000円札を１つずつ投入 */
    public function acceptMoneyList()
    {
        return [
            [10, 1],
            [50, 1],
            [100, 1],
            [500, 1],
            [1000, 1]
        ];
    }

    /**
     * @FIXME 若干動きキモい
     * 複数回投入を行い、受け取りメソッドの戻り値が０であることを確認
     * @test
     */
    public function 投入は複数回できる()
    {
        $result = $this->machine->receiveMoney(1000);
        $result += $this->machine->receiveMoney(10);

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function 投入金額の総計を取得できる()
    {
        $this->machine->receiveMoney(1000);
        $this->machine->receiveMoney(1000);
        $this->assertEquals(2000, $this->machine->showAmount());
    }

    /**
     * @test
     */
    public function 払い戻し操作を行うと投入金額の総計を釣り銭として出力する()
    {
        $this->machine->receiveMoney(10);
        $this->machine->receiveMoney(1000);
        $this->machine->receiveMoney(100);
        $this->machine->receiveMoney(500);
        $this->machine->receiveMoney(50);

        $this->assertEquals(1660, $this->machine->refund());

    }
}
