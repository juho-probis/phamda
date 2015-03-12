<?php

/*
 * This file is part of the Phamda library
 *
 * (c) Mikael Pajunen <mikael.pajunen@gmail.com>
 *
 * For the full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 */

namespace Phamda\Tests;

use Phamda\Phamda;
use Phamda\Tests\Fixtures\ArrayCollection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    use BasicProvidersTrait, CollectionTestTrait;

    /**
     * @dataProvider getAllData
     */
    public function testAll($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::all($predicate, $_collection);
        $this->assertSame($expected, $result, 'all works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'all does not modify original collection values.');
    }

    /**
     * @dataProvider getAnyData
     */
    public function testAny($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::any($predicate, $_collection);
        $this->assertSame($expected, $result, 'any works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'any does not modify original collection values.');
    }

    /**
     * @dataProvider getContainsData
     */
    public function testContains($expected, $value, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::contains($value, $_collection);
        $this->assertSame($expected, $result, 'contains works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'contains does not modify original collection values.');
    }

    /**
     * @dataProvider getFilterData
     */
    public function testFilter($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::filter($predicate, $_collection);
        $this->assertSame($expected, $this->getCollectionArray($result), 'filter works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'filter does not modify original collection values.');
    }

    /**
     * @dataProvider getFindData
     */
    public function testFind($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::find($predicate, $_collection);
        $this->assertSame($expected, $result, 'find works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'find does not modify original collection values.');
    }

    /**
     * @dataProvider getFindIndexData
     */
    public function testFindIndex($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::findIndex($predicate, $_collection);
        $this->assertSame($expected, $result, 'findIndex works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'findIndex does not modify original collection values.');
    }

    /**
     * @dataProvider getFindLastData
     */
    public function testFindLast($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::findLast($predicate, $_collection);
        $this->assertSame($expected, $result, 'findLast works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'findLast does not modify original collection values.');
    }

    /**
     * @dataProvider getFindLastIndexData
     */
    public function testFindLastIndex($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::findLastIndex($predicate, $_collection);
        $this->assertSame($expected, $result, 'findLastIndex works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'findLastIndex does not modify original collection values.');
    }

    /**
     * @dataProvider getFirstData
     */
    public function testFirst($expected, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::first($_collection);
        $this->assertSame($expected, $result, 'first works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'first does not modify original collection values.');
    }

    /**
     * @dataProvider getGroupByData
     */
    public function testGroupBy($expected, callable $function, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::groupBy($function, $_collection);
        $this->assertSame($expected, $this->getCollectionGroupArray($result), 'groupBy works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'groupBy does not modify original collection values.');
    }

    /**
     * @dataProvider getIndexOfData
     */
    public function testIndexOf($expected, $item, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::indexOf($item, $_collection);
        $this->assertSame($expected, $result, 'indexOf works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'indexOf does not modify original collection values.');
    }

    /**
     * @dataProvider getIsEmptyData
     */
    public function testIsEmpty($expected, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::isEmpty($_collection);
        $this->assertSame($expected, $result, 'isEmpty works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'isEmpty does not modify original collection values.');
    }

    /**
     * @dataProvider getLastData
     */
    public function testLast($expected, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::last($_collection);
        $this->assertSame($expected, $result, 'last works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'last does not modify original collection values.');
    }

    /**
     * @dataProvider getMapData
     */
    public function testMap($expected, callable $function, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::map($function, $_collection);
        $this->assertSame($expected, $this->getCollectionArray($result), 'map works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'map does not modify original collection values.');
    }

    /**
     * @dataProvider getMaxData
     */
    public function testMax($expected, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::max($_collection);
        $this->assertSame($expected, $result, 'max works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'max does not modify original collection values.');
    }

    /**
     * @dataProvider getMaxByData
     */
    public function testMaxBy($expected, callable $getValue, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::maxBy($getValue, $_collection);
        $this->assertSame($expected, $result, 'maxBy works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'maxBy does not modify original collection values.');
    }

    /**
     * @dataProvider getMinData
     */
    public function testMin($expected, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::min($_collection);
        $this->assertSame($expected, $result, 'min works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'min does not modify original collection values.');
    }

    /**
     * @dataProvider getMinByData
     */
    public function testMinBy($expected, callable $getValue, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::minBy($getValue, $_collection);
        $this->assertSame($expected, $result, 'minBy works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'minBy does not modify original collection values.');
    }

    /**
     * @dataProvider getNoneData
     */
    public function testNone($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::none($predicate, $_collection);
        $this->assertSame($expected, $result, 'none works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'none does not modify original collection values.');
    }

    /**
     * @dataProvider getPartitionData
     */
    public function testPartition($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::partition($predicate, $_collection);
        $this->assertSame($expected, $this->getCollectionGroupArray($result), 'partition works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'partition does not modify original collection values.');
    }

    /**
     * @dataProvider getPluckData
     */
    public function testPluck($expected, $name, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::pluck($name, $_collection);
        $this->assertSame($expected, $this->getCollectionArray($result), 'pluck works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'pluck does not modify original collection values.');
    }

    /**
     * @dataProvider getProductData
     */
    public function testProduct($expected, $values)
    {
        $_values = new ArrayCollection($values);
        $result  = Phamda::product($_values);
        $this->assertSame($expected, $result, 'product works for collection objects.');
        $this->assertSame($values, $_values->toArray(), 'product does not modify original collection values.');
    }

    /**
     * @dataProvider getReduceData
     */
    public function testReduce($expected, callable $function, $initial, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::reduce($function, $initial, $_collection);
        $this->assertSame($expected, $result, 'reduce works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'reduce does not modify original collection values.');
    }

    /**
     * @dataProvider getReduceRightData
     */
    public function testReduceRight($expected, callable $function, $initial, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::reduceRight($function, $initial, $_collection);
        $this->assertSame($expected, $result, 'reduceRight works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'reduceRight does not modify original collection values.');
    }

    /**
     * @dataProvider getRejectData
     */
    public function testReject($expected, callable $predicate, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::reject($predicate, $_collection);
        $this->assertSame($expected, $this->getCollectionArray($result), 'reject works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'reject does not modify original collection values.');
    }

    /**
     * @dataProvider getReverseData
     */
    public function testReverse($expected, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::reverse($_collection);
        $this->assertSame($expected, $result, 'reverse works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'reverse does not modify original collection values.');
    }

    /**
     * @dataProvider getSliceData
     */
    public function testSlice($expected, $start, $end, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::slice($start, $end, $_collection);
        $this->assertSame($expected, $this->getCollectionArray($result), 'slice works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'slice does not modify original collection values.');
    }

    /**
     * @dataProvider getSortData
     */
    public function testSort($expected, callable $comparator, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::sort($comparator, $_collection);
        $this->assertSame($expected, $this->getCollectionArray($result), 'sort works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'sort does not modify original collection values.');
    }

    /**
     * @dataProvider getSortByData
     */
    public function testSortBy($expected, callable $function, $collection)
    {
        $_collection = new ArrayCollection($collection);
        $result      = Phamda::sortBy($function, $_collection);
        $this->assertSame($expected, $this->getCollectionArray($result), 'sortBy works for collection objects.');
        $this->assertSame($collection, $_collection->toArray(), 'sortBy does not modify original collection values.');
    }

    /**
     * @dataProvider getSumData
     */
    public function testSum($expected, $values)
    {
        $_values = new ArrayCollection($values);
        $result  = Phamda::sum($_values);
        $this->assertSame($expected, $result, 'sum works for collection objects.');
        $this->assertSame($values, $_values->toArray(), 'sum does not modify original collection values.');
    }
}