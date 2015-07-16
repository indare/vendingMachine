<?php
namespace VendingBundle\Entity;

class Coke implements BeverageInterface
{
    private $name;
    private $price;
    private $count;

    /**
     * Beverage constructor.
     * @param int $count
     */
    public function __construct($count = 0)
    {
        $this->name = "コーラ";
        $this->price = "120";
        $this->count = $count;
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