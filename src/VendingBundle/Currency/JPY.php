<?php
namespace VendingBundle\Currency;


class JPY
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $amount;

    private $actual = [10, 50, 100, 500, 1000];

    /**
     * JPY constructor.
     * @param string $name
     * @param int $amount
     * @codeCoverageIgnore
     */
    public function __construct(string $name, int $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function name()
    {
        return $this->name;
    }

    /** @return bool */
    public function canUse()
    {
        return (false !== array_search($this->amount(), $this->actual));
    }


}