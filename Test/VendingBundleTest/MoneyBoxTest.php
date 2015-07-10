<?php
namespace VendingBundleTest;

use VendingBundle\MoneyBox;

class MoneyBoxTest extends \PHPUnit_Framework_TestCase
{
    /** @var MoneyBox */
    private $moneyBox;

    /** @setup */
    public function setup()
    {
        $this->moneyBox = new MoneyBox();
    }

    /** @test */
    public function なにもいれなければ0()
    {
        $this->assertEquals(0, $this->moneyBox->showAmount());
    }

    /** @test */
    public function 入れた分が出る()
    {
        $this->moneyBox->addMoney(100);
        $this->assertEquals(100, $this->moneyBox->showAmount());
    }

    /** @test */
    public function 引き出すと0になる()
    {
        $this->moneyBox->addMoney(100);
        $this->assertEquals(100, $this->moneyBox->showAmount());
        $this->moneyBox->refundMoney();
        $this->assertEquals(0, $this->moneyBox->showAmount());
    }
}
