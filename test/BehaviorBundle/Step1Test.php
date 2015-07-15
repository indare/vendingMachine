<?php
namespace AcceptanceBundle;

use VendingBundle\Machine;

class Step1Test extends \PHPUnit_Framework_TestCase
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
     * @dataProvider invalidMoneyList
     * @param $moneyType
     */
    public function 想定外のものが投入された場合は投入金額に加算せずそれをそのまま釣り銭としてユーザに出力する($moneyType)
    {
        $this->assertEquals($moneyType, $this->machine->receiveMoney($moneyType));
    }

    public function invalidMoneyList()
    {
        return [
            [1],
            [5],
            [2000],
            [5000],
            [10000]
        ];
    }
}
