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


use Octante\MarvelAPIBundle\Model\ValueObjects\CharacterId;

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
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\CharacterId', $sut);
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
 