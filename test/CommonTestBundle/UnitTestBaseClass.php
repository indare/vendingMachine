<?php

namespace CommonTestBundle;

use Pimple\Container;
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
        $this->container['moneyBox'] = function(){return new Box();};
        $this->container['validator'] = function(){return new Validator();};
        $this->container['stock'] = function(){return new Stock();};
    }
}