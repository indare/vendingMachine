<?php

namespace AcceptanceBundle;

use VendingBundle\Entity\Coke;
use VendingBundle\Machine;
use VendingBundle\Money\Box\Box;
use CommonTestBundle\UnitTestBaseClass;

class Step2Test extends UnitTestBaseClass
{
    /** @var Machine */
    private $machine;

    /** @setup */
    public function setup()
    {
        parent::setup();
        $this->machine = new Machine($this->container);
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
