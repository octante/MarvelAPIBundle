<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:02
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\Model\ValueObjects\SerieId;

class SerieIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: SerieIdObjectIsReturned
     */
    function test_createIsCalled_withValidParameters_SerieIdObjectIsReturned()
    {
        $sut = SerieId::create(12345);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\SerieId', $sut);
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenCorrectlySetted
     */
    function test_createIsCalled_withValidParameters_parametersHasBeenCorrectlySetted()
    {
        $sut = SerieId::create(12345);
        $this->assertEquals(12345, $sut->getSerieId());
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidId
     * should: throwAnException
     *
     * @expectedException Octante\MarvelAPIBundle\Exceptions\InvalidSerieIdException
     */
    function test_createIsCalled_withAnInvalidId_throwAnException()
    {
        SerieId::create('an_invalid_comic_id');
    }
}
 