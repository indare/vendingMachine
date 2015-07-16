<?php
namespace VendingBundleTest\Entity;

use VendingBundle\Entity\BeverageInterface;
use VendingBundle\Entity\Coke;

class CokeTest extends \PHPUnit_Framework_TestCase
{

    /** @var BeverageInterface */
    private $coke;


    /**
     * @setup
     */
    public function setup()
    {
        $this->coke = new Coke();
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
