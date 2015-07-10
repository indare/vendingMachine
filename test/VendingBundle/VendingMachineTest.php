<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:06
 */

namespace VendingBundleTest;

use VendingBundle\VendingMachine;

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
        $this->assertEquals(100, $this->vendingMachine->getStockPrice());
    }

    /**
     * @test
     */
    public function 十円玉を1枚いれる()
    {
        $this->vendingMachine->receiveMoney(10);
        $this->assertEquals(10, $this->vendingMachine->getStockPrice());
    }

    /**
     * @test
     */
    public function 百円玉を2枚入れる()
    {
        $this->vendingMachine->receiveMoney(100);
        $this->vendingMachine->receiveMoney(100);
        $this->assertEquals(200, $this->vendingMachine->getStockPrice());
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
        $ejectBox = $this->vendingMachine->checkEjectBox();
        $this->assertFalse($result);
        $this->assertEquals(2000, $ejectBox[0]);
    }

    /**
     * @test
     */
    public function 入れられるお金は帰ってこない()
    {
        $result = $this->vendingMachine->receiveMoney(1000);
        $ejectBox = $this->vendingMachine->checkEjectBox();
        $this->assertTrue($result);
        $this->assertEquals(true, is_null($ejectBox));
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

}
