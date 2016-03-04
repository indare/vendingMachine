<?php

namespace VendingBundleTest\Currency;

use CommonTestBundle\UnitTestBaseClass;
use VendingBundle\Currency\JPY;

class JpyTest extends UnitTestBaseClass
{


    /**
     * @test
     * @dataProvider jpyList
     * @param JPY $jpy
     * @param bool $expect
     */
    public function 通貨が利用できるか(JPY $jpy, bool $expect)
    {

        $this->assertEquals($expect, $jpy->canUse());
    }


    public function jpyList()
    {
        return [
            '1円玉' => ['jpy' => new JPY('1円玉', 1), 'expect' => false],
            '5円玉' => ['jpy' => new JPY('5円玉', 5), 'expect' => false],
            '10円玉' => ['jpy' => new JPY('10円玉', 10), 'expect' => true],
            '50円玉' => ['jpy' => new JPY('50円玉', 50), 'expect' => true],
            '100円玉' => ['jpy' => new JPY('100円玉', 100), 'expect' => true],
            '500円玉' => ['jpy' => new JPY('500円玉', 500), 'expect' => true],
            '1000円札' => ['jpy' => new JPY('1000円札', 1000), 'expect' => true],
            '2000円札' => ['jpy' => new JPY('2000円札', 2000), 'expect' => false],
            '5000円札' => ['jpy' => new JPY('5000円札', 5000), 'expect' => false],
            '10000円札' => ['jpy' => new JPY('10000円札', 10000), 'expect' => false],

        ];
    }

}
