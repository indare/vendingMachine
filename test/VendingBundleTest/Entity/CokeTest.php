<?php

namespace CommonTestBundle\Entity;

use CommonTestBundle\UnitTestBaseClass;
use VendingBundle\Entity\BeverageInterface;
use VendingBundle\Entity\Coke;

class CokeTest extends UnitTestBaseClass
{

    /** @var BeverageInterface */
    private $coke;

    /**
     * @setup
     */
    public function setup()
    {
        parent::setup();
        $this->coke = $this->container['class.beverage.coke'];
    }

    /**
     * @test
     */
    public function あなたのお名前はコーラですね()
    {
        $this->assertEquals('コーラ', $this->coke->getName());
    }

    /**
     * @test
     */
    public function 今は5本ある()
    {
        $this->assertEquals(5, $this->coke->getCount());
    }

    /**
     * @test
     */
    public function 値段は120円()
    {
        $this->assertEquals(120, $this->coke->getPrice());
    }

}
