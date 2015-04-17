<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValueObjects;

use Octante\MarvelAPIBundle\Model\DataContainer\DataContainer;

class DataContainerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: DataContainerInstanceIsReturned
     */
    public function test_createIsCalled_withValidParameters_DataContainerInstanceIsReturned()
    {
        $sut = DataContainer::create(1, 2, 3, 4, []);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\DataContainer\DataContainer', $sut);
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidOffset
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid offset "invalid_offset"
     */
    public function test_createIsCalled_withAnInvalidOffset_throwAnException()
    {
        DataContainer::create('invalid_offset', 2, 3, 4, []);
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidLimit
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid limit "invalid_limit"
     */
    public function test_createIsCalled_withAnInvalidLimit_throwAnException()
    {
        DataContainer::create(1, 'invalid_limit', 3, 4, []);
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidTotal
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid total "invalid_total"
     */
    public function test_createIsCalled_withAnInvalidTotal_throwAnException()
    {
        DataContainer::create(1, 2, 'invalid_total', 4, []);
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidCount
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid count "invalid_count"
     */
    public function test_createIsCalled_withAnInvalidCount_throwAnException()
    {
        DataContainer::create(1, 2, 3, 'invalid_count', []);
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenSetted
     */
    public function test_createIsCalled_withValidParameters_parametersHasBeenSetted()
    {
        $sut = DataContainer::create(1, 2, 3, 4, []);
        $this->assertEquals(1, $sut->getOffset());
        $this->assertEquals(2, $sut->getLimit());
        $this->assertEquals(3, $sut->getTotal());
        $this->assertEquals(4, $sut->getCount());
        $this->assertEquals([], $sut->getResults());
    }
}
