<?php

namespace CommonTestBundle;

use Pimple\Container;
use VendingBundle\Lane;
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

    public function test()
    {
    }

    /** @setup */
    protected function setup()
    {
        $this->container = new Container();

        /** @return BoxInterface */
        $this->container['class.box'] = function () {
            return new Box();
        };

        $this->container['lane'] = function () {

            $cokeLane = new Lane('コーラ', 120);
            $cokeLane->insertBeverage(5);

            return $cokeLane;

        };

        /** @return ValidatorInterface */
        $this->container['class.validator'] = function () {
            return new Validator();
        };

    }
}