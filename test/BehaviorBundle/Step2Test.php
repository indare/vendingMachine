<?php

namespace AcceptanceBundle;

use VendingBundle\Entity\Coke;
use VendingBundle\Machine;

class Step2Test extends \PHPUnit_Framework_TestCase
{
    /** @var Machine */
    private $machine;

    /** @setup */
    public function setup()
    {
        $this->machine = new Machine();
    }

    /** @test */
    public function 初期状態で値段120円のコーラを5本格納している()
    {
        /** @var array $result */
        $result = $this->machine->showStock();
        /** @var Coke $stock */
        $stock = $result[0];

        $this->assertEquals("コーラ", $stock->getName());
        $this->assertEquals(120, $stock->getPrice());
        $this->assertEquals(5, $stock->getCount());
    }
}
