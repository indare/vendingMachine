<?php

namespace VendingBundle\Entity;

trait EntityBehaviorTrait
{
    private $price;
    private $name;
    private $count;

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