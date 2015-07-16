<?php

namespace VendingBundleTest;

use VendingBundle\Money\Box\Box;
use VendingBundle\Money\Box\BoxInterface;

class MoneyBoxTest extends \PHPUnit_Framework_TestCase
{
    /** @var BoxInterface */
    private $box;

    /** @setup */
    public function setup()
    {
        $this->box = new Box();
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
