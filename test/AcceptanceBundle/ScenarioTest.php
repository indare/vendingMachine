<?php

namespace AcceptanceBundle;

use VendingBundle\Entity\BeverageInterface;
use VendingBundle\Machine;
use VendingBundle\Money\Box\Box;

class ScenarioTest extends \PHPUnit_Framework_TestCase
{

    /** @var Machine */
    private $machine;

    /** @setup */
    public function setup()
    {
        $box = new Box();
        $this->machine = new Machine($box);
    }

    /** @test */
    public function カスタマーがジュースを確認できる()
    {

        //前提:カスタマーは1251円持っている
        $customerMoney = [1000, 100, 100, 50, 1];

        //自販機に売っているものを確認する
        //@TODO 今は１個しかない
        /** @var BeverageInterface $stock */
        $stock = $this->machine->showStock()[0];

        $this->assertEquals('コーラ', $stock->getName());
        $this->assertEquals(120, $stock->getPrice());

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
