<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:02
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\ValueObjects\CharacterId;

class CharacterIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: CharacterIdObjectIsReturned
     */
    function test_createIsCalled_withValidParameters_CharacterIdObjectIsReturned()
    {
        $sut = CharacterId::create(12345);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\CharacterId', $sut);
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenCorrectlySetted
     */
    function test_createIsCalled_withValidParameters_parametersHasBeenCorrectlySetted()
    {
        $sut = CharacterId::create(12345);
        $this->assertEquals(12345, $sut->getCharacterId());
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidId
     * should: throwAnException
     *
     * @expectedException Octante\MarvelAPIBundle\Exceptions\InvalidCharacterIdException
     */
    function test_createIsCalled_withAnInvalidId_throwAnException()
    {
        CharacterId::create('an_invalid_comic_id');
    }
}
 