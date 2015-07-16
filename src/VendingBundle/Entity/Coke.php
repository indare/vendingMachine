<?php
namespace VendingBundle\Entity;

class Coke implements BeverageInterface
{
    use EntityBehaviorTrait;

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

}