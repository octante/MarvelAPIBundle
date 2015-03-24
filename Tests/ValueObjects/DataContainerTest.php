<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:08
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\ValueObjects\DataContainer;

class DataContainerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: DataContainerInstanceIsReturned
     */
    function test_createIsCalled_withValidParameters_DataContainerInstanceIsReturned()
    {
        $sut = DataContainer::create(1, 2, 3, 4, array());
        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\DataContainer', $sut);
    }
    
    /**
     * when: createIsCalled
     * with: withAnInvalidOffset
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid offset "invalid_offset"
     */
    function test_createIsCalled_withAnInvalidOffset_throwAnException()
    {
        DataContainer::create('invalid_offset', 2, 3, 4, array());
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidLimit
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid limit "invalid_limit"
     */
    function test_createIsCalled_withAnInvalidLimit_throwAnException()
    {
        DataContainer::create(1, 'invalid_limit', 3, 4, array());
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidTotal
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid total "invalid_total"
     */
    function test_createIsCalled_withAnInvalidTotal_throwAnException()
    {
        DataContainer::create(1, 2, 'invalid_total', 4, array());
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidCount
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid count "invalid_count"
     */
    function test_createIsCalled_withAnInvalidCount_throwAnException()
    {
        DataContainer::create(1, 2, 3, 'invalid_count', array());
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenSetted
     */
    function test_createIsCalled_withValidParameters_parametersHasBeenSetted()
    {
        $sut = DataContainer::create(1, 2, 3, 4, array());
        $this->assertEquals(1, $sut->getOffset());
        $this->assertEquals(2, $sut->getLimit());
        $this->assertEquals(3, $sut->getTotal());
        $this->assertEquals(4, $sut->getCount());
        $this->assertEquals(array(), $sut->getResults());
    }
}
 