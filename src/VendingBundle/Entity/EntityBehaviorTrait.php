<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/16
 * Time: 17:47
 */

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