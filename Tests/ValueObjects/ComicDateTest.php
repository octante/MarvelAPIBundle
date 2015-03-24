<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 23:58
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\ValueObjects\ComicDate;

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
        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\ComicDate', $sut);
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
 