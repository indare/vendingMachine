<?php

namespace CommonTestBundle;

use Pimple\Container;
use VendingBundle\Entity\Coke;
use VendingBundle\Money\Box\Box;
use VendingBundle\Money\Validator\Validator;
use VendingBundle\Stock;

class UnitTestBaseClass extends \PHPUnit_Framework_TestCase
{
    /** @var Container $container */
    protected $container;

    /** @setup */
    protected function setup()
    {
        $this->container = new Container();
        $this->container['beverage.coke.count'] = 5;
        $this->container['class.box'] = function(){return new Box();};
        $this->container['class.validator'] = function(){return new Validator();};
        $this->container['class.beverage.coke'] = function($c) {return new Coke($c['beverage.coke.count']);};
        $this->container['class.stock'] = function($c){return new Stock([$c['class.beverage.coke']]);};
    }
}