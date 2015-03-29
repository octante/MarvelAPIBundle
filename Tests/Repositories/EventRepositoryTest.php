<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 19:16
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
}
 