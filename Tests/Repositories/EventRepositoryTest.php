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


use Octante\MarvelAPIBundle\Repositories\EventsRepository;

class EventRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMockBuilder('Octante\MarvelAPIBundle\Lib\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Model\Query\EventQuery')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * when: getEventIsCalled
     * with: withAQuery
     * should: callSendMethodFromClientClass
     */
    function test_getEventIsCalled_withAQuery_callSendMethodFromClientClass()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEmptyEventsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $sut->getEvents($this->queryMock);
    }

    /**
     * when: getEventIsCalled
     * with: withAQuery
     * should: clientReturnEventsCollection
     */
    function test_getEventIsCalled_withAQuery_clientReturnEventsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEventsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $sut->getEvents($this->queryMock);
    }

    /**
     * when: getEventByIdIsCalled
     * with: withAnEventId
     * should: clientReturnEventsCollection
     */
    function test_getEventByIdIsCalled_withAnEventId_clientReturnEventsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEvent.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $eventData = $sut->getEventById(1011334);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\EventsCollection', $eventData);
    }

    /**
     * when: getCharactersFromCreator
     * with: AComicId
     * should: clientReturnCharactersCollection
     */
    function test_getCharactersFromCreator_ACharacterId_clientReturnCharactersCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCharactersCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $characterData = $sut->getCharactersFromEvent(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\CharactersCollection', $characterData);
    }

    /**
     * when: getComicsFromEvent
     * with: AComicId
     * should: clientReturnComicsCollection
     */
    function test_getComicsFromEvent_ACharacterId_clientReturnComicsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getComicsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $characterData = $sut->getComicsFromEvent(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\ComicsCollection', $characterData);
    }

    /**
     * when: getCreatorsFromEvent
     * with: AComicId
     * should: clientReturnCreatorsCollection
     */
    function test_getCreatorsFromEvent_ACharacterId_clientReturnCreatorsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCreatorsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $characterData = $sut->getCreatorsFromEvent(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection', $characterData);
    }

    /**
     * when: getSeriesFromEvent
     * with: AComicId
     * should: clientReturnSeriesCollection
     */
    function test_getSeriesFromEvent_ACharacterId_clientReturnSeriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getSeriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $characterData = $sut->getSeriesFromEvent(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\SeriesCollection', $characterData);
    }

    /**
     * when: getStoriesFromEvent
     * with: AComicId
     * should: clientReturnStoriesCollection
     */
    function test_getStoriesFromEvent_ACharacterId_clientReturnSeriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getStoriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new EventsRepository($this->client);
        $characterData = $sut->getStoriesFromEvent(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\StoriesCollection', $characterData);
    }
}
 