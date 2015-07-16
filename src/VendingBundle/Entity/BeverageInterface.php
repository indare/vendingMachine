<?php
namespace VendingBundle\Entity;


Interface BeverageInterface
{
    /** @return string */
    public function getName();

    /** @return int */
    public function getCount();

    /** @return int */
    public function getPrice();

}