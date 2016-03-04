<?php

namespace CommonTestBundle;

use Pimple\Container;
use VendingBundle\Money\Box\Box;
use VendingBundle\Money\Box\BoxInterface;
use VendingBundle\Money\Validator\Validator;
use VendingBundle\Money\Validator\ValidatorInterface;

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
        $this->container['class.box'] = function () {
            return new Box();
        };

        /** @return ValidatorInterface */
        $this->container['class.validator'] = function () {
            return new Validator();
        };

    }

    public function test()
    {
    }
}