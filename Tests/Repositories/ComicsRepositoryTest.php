<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 19:16
 */

namespace Octante\MarvelAPIBundle\Tests\Repositories;


use Octante\MarvelAPIBundle\Repositories\ComicsRepository;

class ComicsRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMock('Octante\MarvelAPIBundle\Lib\Client');
        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Model\Query\ComicQuery')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * when: getComicsIsCalled
     * with: withAQuery
     * should: callSendMethodFromClientClass
     */
    function test_getComicsIsCalled_withAQuery_callSendMethodFromClientClass()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEmptyComicsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $sut->getComics($this->queryMock);
    }

    /**
     * when: getComicsIsCalled
     * with: withAQuery
     * should: clientReturnComicsCollection
     */
    function test_getComicsIsCalled_withAQuery_clientReturnComicsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getComicsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $sut->getComics($this->queryMock);
    }
}
 