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

    /**
     * @test
     */
    public function GetVendingMachine(){
        $vendingMachine = new VendingMachine();

        $this->assertEquals('VendingMachine',$vendingMachine->getName());
    }


}
