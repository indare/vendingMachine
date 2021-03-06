<?php

namespace AcceptanceBundle;

use VendingBundle\Lane;
use VendingBundle\Machine;
use CommonTestBundle\UnitTestBaseClass;

class ScenarioTest extends UnitTestBaseClass
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

    /** @test */
    public function カスタマーがジュースを確認できる()
    {

        //前提:カスタマーは1251円持っている
        $customerMoney = [1000, 100, 100, 50, 1];

        //自販機に売っているものを確認する
        //@TODO 今は１個しかない
        /** @var Lane $stock */
        $stock = $this->machine->showStock();

        $this->assertEquals('コーラ', $stock->name());
        $this->assertEquals(120, $stock->price());

        //ユーザーはジュースが何個変えるかは知る必要がない。

        //コーラが飲みたいので有り金突っ込んでみる
        foreach ($customerMoney as $money) {
            $this->machine->receiveMoney($money);
        }

        //1円は受け取られないので1250円表示になる
        $this->assertEquals(1250, $this->machine->showAmount());

        //買う気が失せたのでお金を払い戻す
        $this->assertEquals(1250, $this->machine->refund());

    }

}
