<?php

namespace VendingBundleTest;

use VendingBundle\Entity\Coke;
use VendingBundle\Machine;

class VendingMachineTest extends \PHPUnit_Framework_TestCase
{

    /** @var Machine */
    private $vendingMachine;


    public function setup()
    {
        $this->vendingMachine = new Machine();
    }

    /**
     * @test
     */
    public function 百円玉を1枚いれる()
    {
        $this->vendingMachine->receiveMoney(100);
        $this->assertEquals(100, $this->vendingMachine->showAmount());
    }

    /**
     * @test
     */
    public function 十円玉を1枚いれる()
    {
        $this->vendingMachine->receiveMoney(10);
        $this->assertEquals(10, $this->vendingMachine->showAmount());
    }

    /**
     * @test
     */
    public function 百円玉を2枚入れる()
    {
        $this->vendingMachine->receiveMoney(100);
        $this->vendingMachine->receiveMoney(100);
        $this->assertEquals(200, $this->vendingMachine->showAmount());
    }

    /**
     * @test
     * @expectedException   \InvalidArgumentException
     * @expectedExceptionMessage これはお金じゃありません。
     */
    public function お金以外は入らない()
    {
        $this->vendingMachine->receiveMoney('ぷれいすてーしょんふぉー');
    }

    /**
     * @test
     */
    public function 入れられないお金は帰ってくる()
    {
        $result = $this->vendingMachine->receiveMoney(2000);
        $this->assertEquals(2000, $result);
    }

    /**
     * @test
     */
    public function 入れられるお金は帰ってこない()
    {
        $result = $this->vendingMachine->receiveMoney(1000);
        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function 入れたお金はかえってくるヤッター()
    {

        $this->vendingMachine->receiveMoney(100);
        $this->vendingMachine->receiveMoney(100);
        $this->vendingMachine->receiveMoney(10);
        $this->vendingMachine->receiveMoney(1000);
        $refund = $this->vendingMachine->refund();

        $this->assertEquals(1210, $refund);

    }

    /**
     * @test
     */
    public function 今の在庫はコーラが５本()
    {
        /** @var Coke $stock */
        $stock = $this->vendingMachine->showStock()[0];
        $this->assertEquals(120, $stock->getPrice());
        $this->assertEquals(5, $stock->getCount());
        $this->assertEquals('コーラ', $stock->getName());

    }

}