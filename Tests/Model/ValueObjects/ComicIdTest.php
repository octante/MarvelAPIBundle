<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:02
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\Model\ValueObjects\ComicId;

class ComicIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: ComicIdObjectIsReturned
     */
    function test_createIsCalled_withValidParameters_ComicIdObjectIsReturned()
    {
        $sut = ComicId::create(12345);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\ComicId', $sut);
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenCorrectlySetted
     */
    function test_createIsCalled_withValidParameters_parametersHasBeenCorrectlySetted()
    {
        $sut = ComicId::create(12345);
        $this->assertEquals(12345, $sut->getComicId());
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidId
     * should: throwAnException
     *
     * @expectedException Octante\MarvelAPIBundle\Exceptions\InvalidComicIdException
     */
    function test_createIsCalled_withAnInvalidId_throwAnException()
    {
        ComicId::create('an_invalid_comic_id');
    }
}
 