<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\Model\ValueObjects\ComicDate;

class ComicDateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: ComicIdObjectIsReturned
     */
    function test_createIsCalled_withValidParameters_ComicIdObjectIsReturned()
    {
        $sut = ComicDate::create('comic_type', 'comic_date');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\ComicDate', $sut);
    }

    /**
     * when: callCreate
     * with: validParameters
     * should: parametersHasBeenCorrectlySetted
     */
    function test_callCreate_validParameters_parametersHasBeenCorrectlySetted()
    {
        $sut = ComicDate::create('comic_type', 'comic_date');
        $this->assertEquals('comic_type', $sut->getType());
        $this->assertEquals('comic_date', $sut->getDate());
    }
}
 