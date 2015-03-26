<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 19:16
 */

namespace Octante\MarvelAPIBundle\Tests\Repositories;


use Octante\MarvelAPIBundle\Repositories\CharactersRepository;
use Octante\MarvelAPIBundle\Repositories\CreatorsRepository;
use Octante\MarvelAPIBundle\Repositories\EventsRepository;

class EventRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMock('Octante\MarvelAPIBundle\Lib\Client');
        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Query\EventQuery')
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
}
 