<?php

namespace CommonTestBundle;

use Pimple\Container;
use VendingBundle\Entity\BeverageInterface;
use VendingBundle\Entity\Coke;
use VendingBundle\Money\Box\Box;
use VendingBundle\Money\Box\BoxInterface;
use VendingBundle\Money\Validator\Validator;
use VendingBundle\Money\Validator\ValidatorInterface;
use VendingBundle\Stock;

/**
 * Class UnitTestBaseClass
 * @package CommonTestBundle
 * @codeCoverageIgnore
 */
class UnitTestBaseClass extends \PHPUnit_Framework_TestCase
{
    /** @var Container $container */
    protected $container;

    /** @setup */
    protected function setup()
    {
        $this->container = new Container();

        /** @return int */
        $this->container['beverage.coke.count'] = 5;

        /** @return BoxInterface */
        $this->container['class.box'] = function($c){return new Box();};

        /** @return ValidatorInterface */
        $this->container['class.validator'] = function($c){return new Validator();};

        /**
         * @param Container $c
         * @return BeverageInterface
         */
        $this->container['class.beverage.coke'] = function($c) {return new Coke($c['beverage.coke.count']);};

    }

    public function test()
    {
    }
}