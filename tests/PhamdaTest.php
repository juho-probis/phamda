<?php

namespace Phamda\Tests;

use Phamda\Phamda;

class PhamdaTest extends \PHPUnit_Framework_TestCase
{
    use BasicProvidersTrait;

    /**
     * @dataProvider getAllData
     */
    public function testAll(callable $function, array $list, $expected)
    {
        $this->assertEquals($expected, Phamda::all($function, $list));
        $curried1 = Phamda::all($function);
        $this->assertEquals($expected, $curried1($list));
    }

    /**
     * @dataProvider getAnyData
     */
    public function testAny(callable $function, array $list, $expected)
    {
        $this->assertEquals($expected, Phamda::any($function, $list));
        $curried1 = Phamda::any($function);
        $this->assertEquals($expected, $curried1($list));
    }

    /**
     * @dataProvider getEqData
     */
    public function testEq($a, $b, $expected)
    {
        $this->assertEquals($expected, Phamda::eq($a, $b));
        $curried1 = Phamda::eq($a);
        $this->assertEquals($expected, $curried1($b));
    }

    /**
     * @dataProvider getFilterData
     */
    public function testFilter(callable $function, array $list, $expected)
    {
        $this->assertEquals($expected, Phamda::filter($function, $list));
        $curried1 = Phamda::filter($function);
        $this->assertEquals($expected, $curried1($list));
    }

    /**
     * @dataProvider getMapData
     */
    public function testMap(callable $function, array $list, $expected)
    {
        $this->assertEquals($expected, Phamda::map($function, $list));
        $curried1 = Phamda::map($function);
        $this->assertEquals($expected, $curried1($list));
    }

    /**
     * @dataProvider getPickData
     */
    public function testPick(array $names, array $item, $expected)
    {
        $this->assertEquals($expected, Phamda::pick($names, $item));
        $curried1 = Phamda::pick($names);
        $this->assertEquals($expected, $curried1($item));
    }

    /**
     * @dataProvider getPickAllData
     */
    public function testPickAll(array $names, array $item, $expected)
    {
        $this->assertEquals($expected, Phamda::pickAll($names, $item));
        $curried1 = Phamda::pickAll($names);
        $this->assertEquals($expected, $curried1($item));
    }

    /**
     * @dataProvider getPropData
     */
    public function testProp($name, $object, $expected)
    {
        $this->assertEquals($expected, Phamda::prop($name, $object));
        $curried1 = Phamda::prop($name);
        $this->assertEquals($expected, $curried1($object));
    }

    /**
     * @dataProvider getPropEqData
     */
    public function testPropEq($name, $value, $object, $expected)
    {
        $this->assertEquals($expected, Phamda::propEq($name, $value, $object));
        $curried1 = Phamda::propEq($name);
        $this->assertEquals($expected, $curried1($value, $object));
        $curried2 = Phamda::propEq($name, $value);
        $this->assertEquals($expected, $curried2($object));
    }

    /**
     * @dataProvider getReduceData
     */
    public function testReduce(callable $function, $initial, array $list, $expected)
    {
        $this->assertEquals($expected, Phamda::reduce($function, $initial, $list));
        $curried1 = Phamda::reduce($function);
        $this->assertEquals($expected, $curried1($initial, $list));
        $curried2 = Phamda::reduce($function, $initial);
        $this->assertEquals($expected, $curried2($list));
    }

    /**
     * @dataProvider getSortData
     */
    public function testSort(callable $comparator, array $list, $expected)
    {
        $this->assertEquals($expected, Phamda::sort($comparator, $list));
        $curried1 = Phamda::sort($comparator);
        $this->assertEquals($expected, $curried1($list));
    }

    /**
     * @dataProvider getZipData
     */
    public function testZip(array $a, array $b, $expected)
    {
        $this->assertEquals($expected, Phamda::zip($a, $b));
        $curried1 = Phamda::zip($a);
        $this->assertEquals($expected, $curried1($b));
    }

    /**
     * @dataProvider getZipWithData
     */
    public function testZipWith(callable $function, array $a, array $b, $expected)
    {
        $this->assertEquals($expected, Phamda::zipWith($function, $a, $b));
        $curried1 = Phamda::zipWith($function);
        $this->assertEquals($expected, $curried1($a, $b));
        $curried2 = Phamda::zipWith($function, $a);
        $this->assertEquals($expected, $curried2($b));
    }
}
