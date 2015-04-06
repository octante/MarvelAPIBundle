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


use Octante\MarvelAPIBundle\Repositories\SeriesRepository;

class SerieRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMockBuilder('Octante\MarvelAPIBundle\Lib\Client')
            ->disableOriginalConstructor()
            ->getMock();
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

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $seriesData = $sut->getSerieById(1011334);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\SeriesCollection', $seriesData);
    }

    /**
     * when: getCharactersFromSerie
     * with: AComicId
     * should: clientReturnCreatorsCollection
     */
    function test_getCharactersFromSerie_ACharacterId_clientReturnCharactersCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCharactersCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $characterData = $sut->getCharactersFromSerie(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\CharactersCollection', $characterData);
    }

    /**
     * when: getComicsFromSerie
     * with: AComicId
     * should: clientReturnSeriesCollection
     */
    function test_getComicsFromSerie_ACharacterId_clientReturnSeriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getSeriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $characterData = $sut->getComicsFromSerie(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\ComicsCollection', $characterData);
    }

    /**
     * when: getCreatorsFromSerie
     * with: AComicId
     * should: clientReturnCreatorsCollection
     */
    function test_getCreatorsFromSerie_ACharacterId_clientReturnCreatorsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCreatorsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $characterData = $sut->getCreatorsFromSerie(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection', $characterData);
    }

    /**
     * when: getEventsFromSerie
     * with: AComicId
     * should: clientReturnEventsCollection
     */
    function test_getEventsFromSerie_ACharacterId_clientReturnEventsCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEventsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $characterData = $sut->getEventsFromSerie(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\EventsCollection', $characterData);
    }

    /**
     * when: getStoriesFromSerie
     * with: AComicId
     * should: clientReturnStoriesCollection
     */
    function test_getStoriesFromSerie_ACharacterId_clientReturnStoriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getStoriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new SeriesRepository($this->client);
        $characterData = $sut->getStoriesFromSerie(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\StoriesCollection', $characterData);
    }
}
 