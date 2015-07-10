<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:06
 */

namespace VendingBundleTest;
use VendingBundle\MoneyValidator;
use VendingBundle\VendingMachine;

class VendingMachineTest extends \PHPUnit_Framework_TestCase {

    /** @var VendingMachine */
    private $vendingMachine;


    public function setup(){
        $this->vendingMachine = new VendingMachine();
    }

    /**
     * @test
     */
    public function GetVendingMachine(){
        $vendingMachine = new VendingMachine();

        $this->assertEquals('VendingMachine',$vendingMachine->getName());
    }

    /**
     * @test
     */
    public function 百円玉を1枚いれる(){
        $display = $this->vendingMachine->receiveMoney(100);
        $this->assertEquals(100, $display);
    }

    /**
     * @test
     */
    public function 十円玉を1枚いれる(){
        $display = $this->vendingMachine->receiveMoney(10);
        $this->assertEquals(10,$display);
    }

    /**
     * @test
     */
    public function 百円玉を2枚入れる(){
        $display = $this->vendingMachine->receiveMoney(100);
        $display = $this->vendingMachine->receiveMoney(100);
        $this->assertEquals(200,$display);
    }

    /**
     * @test
     * @expectedException   \InvalidArgumentException
     * @expectedExceptionMessage これはお金じゃありません。
     */
    public function お金以外は入らない(){
        $this->vendingMachine->receiveMoney('ぷれいすてーしょんふぉー');
    }

    /**
     * @test
     */
    public function 入れられないお金は帰ってくる()
    {

    }


    /**
     * @test
     * @dataProvider actualMoneyList
     * @param $actualMoney
     * @param $actualResult
     */
    public function 投入可能なお金判定のテスト($actualMoney,$actualResult)
    {
        $moneyVaildator = new MoneyValidator();
        $result = $moneyVaildator->checkMoney($actualMoney);
        $this->assertEquals($result,$actualResult);

    }

    /**
     * @return array
     */
    public function putMoneyLiet()
    {
        return [
            [[1,10,100],[1,10,110]],
            [[1000,1000,10000],[1000,2000,10000]]
        ];
    }


    /**
     * @return array
     */
    public function actualMoneyList()
    {
        return [
            [1,false],
            [5, false],
            [10, true],
            [50, true],
            [100, true],
            [500, true],
            [1000, true],
            [2000, false],
            [5000, false],
            [10000, false]
        ];
    }
}
