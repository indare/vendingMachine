<?php

namespace AcceptanceBundle;

use VendingBundle\Machine;
use CommonTestBundle\UnitTestBaseClass;

class Step1Test extends UnitTestBaseClass
{

    /**
     * @var Machine
     */
    private $machine;

    /** @setup */
    public function setup()
    {
        parent::setup();
        $this->machine = new Machine($this->container);
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


    /**
     * @return array
     */
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
