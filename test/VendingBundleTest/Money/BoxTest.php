<?php

namespace VendingBundleTest\Money;

use CommonTestBundle\UnitTestBaseClass;
use VendingBundle\Money\Box\BoxInterface;

class MoneyBoxTest extends UnitTestBaseClass
{
    /** @var BoxInterface $box */
    private $box;

    /** @setup */
    public function setup()
    {
        parent::setup();
        $this->box = $this->container['class.box'];
    }

    /** @test */
    public function なにもいれなければ0()
    {
        $this->assertEquals(0, $this->box->showAmount());
    }

    /** @test */
    public function 入れた分が出る()
    {
        $this->box->addMoney(100);
        $this->assertEquals(100, $this->box->showAmount());
    }

    /** @test */
    public function 引き出すと0になる()
    {
        $this->box->addMoney(100);
        $this->assertEquals(100, $this->box->showAmount());
        $this->box->refundMoney();
        $this->assertEquals(0, $this->box->showAmount());
    }
}
