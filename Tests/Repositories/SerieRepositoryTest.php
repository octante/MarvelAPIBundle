<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 19:16
 */

namespace Octante\MarvelAPIBundle\Tests\Repositories;


use Octante\MarvelAPIBundle\Model\ValueObjects\SerieId;
use Octante\MarvelAPIBundle\Repositories\SeriesRepository;

class SerieRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMock('Octante\MarvelAPIBundle\Lib\Client');
        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Model\Query\SerieQuery')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * when: getSerieIsCalled
     * with: withAQuery
     * should: callSendMethodFromClientClass
     */
    function test_getSerieIsCalled_withAQuery_callSendMethodFromClientClass()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEmptySeriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $sut->getSeries($this->queryMock);
    }

    /**
     * when: getSerieIsCalled
     * with: withAQuery
     * should: clientReturnSeriesCollection
     */
    function test_getSerieIsCalled_withAQuery_clientReturnSeriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getSeriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $sut->getSeries($this->queryMock);
    }

    /**
     * when: getSeriesByIdIsCalled
     * with: withASerieId
     * should: clientReturnSeriesCollection
     */
    function test_getSeriesByIdIsCalled_withASerieId_clientReturnSeriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getSerie.json');

        $serieId = SerieId::create(1011334);

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $seriesData = $sut->getSerieById($serieId);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\SeriesCollection', $seriesData);
    }
}
 