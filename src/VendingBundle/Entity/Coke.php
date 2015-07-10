<?php
namespace VendingBundle\Entity;

class Coke
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
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

}