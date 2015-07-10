<?php

namespace Indare\VendingBundle\Test;

use Indare\VendingBundle\Entity\Coke;
use Indare\VendingBundle\VendingMachine;

class VendingMachineTest extends \PHPUnit_Framework_TestCase
{

    /** @var VendingMachine */
    private $vendingMachine;


    public function setup()
    {
        $this->vendingMachine = new VendingMachine();
    }

    /**
     * @test
     */
    public function GetVendingMachine()
    {
        $vendingMachine = new VendingMachine();

        $this->assertEquals('VendingMachine', $vendingMachine->getName());
    }

    /**
     * @test
     */
    public function 百円玉を1枚いれる()
    {
        $this->vendingMachine->receiveMoney(100);
        $this->assertEquals(100, $this->vendingMachine->currentAmount());
    }

    /**
     * @test
     */
    public function 十円玉を1枚いれる()
    {
        $this->vendingMachine->receiveMoney(10);
        $this->assertEquals(10, $this->vendingMachine->currentAmount());
    }

    /**
     * @test
     */
    public function 百円玉を2枚入れる()
    {
        $this->vendingMachine->receiveMoney(100);
        $this->vendingMachine->receiveMoney(100);
        $this->assertEquals(200, $this->vendingMachine->currentAmount());
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
        $ejectBox = $this->vendingMachine->ejectBox();
        $this->assertFalse($result);
        $this->assertEquals(2000, $ejectBox);
    }

    /**
     * @test
     */
    public function 入れられるお金は帰ってこない()
    {
        $result = $this->vendingMachine->receiveMoney(1000);
        $ejectBox = $this->vendingMachine->ejectBox();
        $this->assertTrue($result);
        $this->assertEquals(0, $ejectBox);
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
        $this->assertEquals(120,$stock->getPrice());
        $this->assertEquals(5,$stock->getCount());
        $this->assertEquals('コーラ',$stock->getName());

    }

}
