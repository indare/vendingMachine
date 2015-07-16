<?php
namespace VendingBundle\Entity;

class Coke implements BeverageInterface
{
    private $name;
    private $price;
    private $count;

    /**
     * Beverage constructor.
     */
    public function __construct()
    {
        $this->name = "コーラ";
        $this->price = "120";
        $this->count = 5;
    }

    /**
     * @inheritdoc
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getCount()
    {
        return $this->count;
    }

}