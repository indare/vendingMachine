<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 10:06
 */

namespace VendingBundleTest;
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
    public function お金を120円入れる(){
        $display = $this->vendingMachine->receiveMoney('120円');
        $this->assertEquals('120円',$display);
    }

    /**
     * @test
     */
    public function お金を200円入れる(){
        $display = $this->vendingMachine->receiveMoney('200円');
        $this->assertEquals('200円',$display);
    }

    /**
     * @test
     */
    public function 百円玉を2枚入れる(){
        $display = $this->vendingMachine->receiveMoney('100円');
        $display = $this->vendingMachine->receiveMoney('100円');
        $this->assertEquals('200円',$display);
    }
}
