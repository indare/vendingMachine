<?php

namespace VendingBundle\Entity;

Interface BeverageInterface
{
    /**
     * エンティティの名称を返す
     *
     * @return string
     */
    public function getName();

    /**
     * エンティティが保持する数量を返す
     *
     * @return int
     */
    public function getCount();

    /**
     * エンティティが保持する価格を返す
     *
     * @return int
     */
    public function getPrice();

}