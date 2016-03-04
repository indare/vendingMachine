<?php

namespace VendingBundle;


class Lane
{
    /**
     * @var string
     */

    private $name;
    /**
     * @var int
     */
    private $price;
    /**
     * @var
     */
    private $count;


    /**
     * Lane constructor.
     * @param string $name
     * @param int $price
     */
    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @param int $count
     */
    public function insertBeverage(int $count)
    {
        $this->count += $count;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->count;
    }

}