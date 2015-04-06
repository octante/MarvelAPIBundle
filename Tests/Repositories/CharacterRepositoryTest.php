<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Tests\Repositories;


use Octante\MarvelAPIBundle\Repositories\CharactersRepository;

class CharacterRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMockBuilder('Octante\MarvelAPIBundle\Lib\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Model\Query\CharacterQuery')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * when: getCharacterIsCalled
     * with: withAQuery
     * should: callSendMethodFromClientClass
     */
    function test_getCharacterIsCalled_withAQuery_callSendMethodFromClientClass()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEmptyCharactersCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CharactersRepository($this->client);
        $sut->getCharacters($this->queryMock);
    }

    /**
     * when: getCharacterIsCalled
     * with: withAQuery
     * should: clientReturnCharacterCollection
     */
    function test_getCharacterIsCalled_withAQuery_clientReturnCharacterCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCharactersCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CharactersRepository($this->client);
        $sut->getCharacters($this->queryMock);
    }

    /**
     * when: getCharacterByIdIsCalled
     * with: withACharacterId
     * should: clientReturnCharacterCollection
     */
    function test_getCharacterByIdIsCalled_withACharacterId_clientReturnCharacterCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCharacter.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CharactersRepository($this->client);
        $characterData = $sut->getCharacterById(1011334);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\CharactersCollection', $characterData);
    }

    /**
     * when: getComicsFromCharacter
     * with: ACharacterId
     * should: clientReturnComicsCollection
     */
    function test_getComicsFromCharacter_ACharacterId_clientReturnComicsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getComicsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CharactersRepository($this->client);
        $characterData = $sut->getComicsFromCharacter(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\ComicsCollection', $characterData);
    }

    /**
     * when: getEventsFromCharacter
     * with: ACharacterId
     * should: clientReturnEventsCollection
     */
    function test_getEventsFromCharacter_ACharacterId_clientReturnEventsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEventsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CharactersRepository($this->client);
        $characterData = $sut->getEventsFromCharacter(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\EventsCollection', $characterData);
    }

    /**
     * when: getSeriesFromCharacter
     * with: ACharacterId
     * should: clientReturnSeriesCollection
     */
    function test_getSeriesFromCharacter_ACharacterId_clientReturnSeriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getSeriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CharactersRepository($this->client);
        $characterData = $sut->getSeriesFromCharacter(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\SeriesCollection', $characterData);
    }

    /**
     * when: getStoriesFromCharacter
     * with: ACharacterId
     * should: clientReturnStoriesCollection
     */
    function test_getStoriesFromCharacter_ACharacterId_clientReturnStoriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getStoriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CharactersRepository($this->client);
        $characterData = $sut->getStoriesFromCharacter(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\StoriesCollection', $characterData);
    }
}