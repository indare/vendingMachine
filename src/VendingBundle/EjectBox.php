<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 15/07/10
 * Time: 22:10
 */

namespace VendingBundle;

/**
 * Class EjectBox 返却口クラス
 * @package VendingBundle
 */
class EjectBox
{
    /** @var array */
    private $contain;

    /**
     * @return array
     */
    public function getContain()
    {
        return $this->contain;
    }

    /**
     * @param int $contain
     */
    public function setContain($contain)
    {
        $this->contain[] = $contain;
    }


    /**
     * @param int $index
     * @return int|null
     */
    public function takeOutContain($index)
    {
        if (sizeof($this->contain) == 0)
        {
            return null;
        }

        try {
            $return = $this->contain[$index];
        }catch(\OutOfRangeException $e)
        {
            throw new \OutOfRangeException("知らないお金は返せません。", $e->getCode());
        }

        array_splice($this->contain,$index);

        return $return;
    }
}