<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Tests\Repositories;

use Octante\MarvelAPIBundle\Repositories\ComicsRepository;

class ComicsRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMockBuilder('Octante\MarvelAPIBundle\Lib\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Model\Query\ComicQuery')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * when: getComicsIsCalled
     * with: withAQuery
     * should: callSendMethodFromClientClass
     */
    public function test_getComicsIsCalled_withAQuery_callSendMethodFromClientClass()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../Fixtures/getEmptyComicsCollection.json');

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
    public function test_getComicsIsCalled_withAQuery_clientReturnComicsCollection()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../Fixtures/getComicsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $sut->getComics($this->queryMock);
    }

    /**
     * when: getComicByIdIsCalled
     * with: withAComicId
     * should: clientReturnComicCollection
     */
    public function test_getComicByIdIsCalled_withAComicId_clientReturnComicCollection()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../Fixtures/getComic.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $comicData = $sut->getComicById(1011334);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\ComicsCollection', $comicData);
    }

    /**
     * when: getCharactersFromComic
     * with: AComicId
     * should: clientReturnCharactersCollection
     */
    public function test_getCharactersFromComic_ACharacterId_clientReturnStoriesCollection()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../Fixtures/getCharactersCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $characterData = $sut->getCharactersFromComic(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\CharactersCollection', $characterData);
    }

    /**
     * when: getEventsFromComic
     * with: AComicId
     * should: clientReturnEventsCollection
     */
    public function test_getEventsFromComic_ACharacterId_clientReturnEventsCollection()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../Fixtures/getEventsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $characterData = $sut->getEventsFromComic(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\EventsCollection', $characterData);
    }

    /**
     * when: getCreatorsFromComic
     * with: AComicId
     * should: clientReturnCreatorsCollection
     */
    public function test_getCreatorsFromComic_ACharacterId_clientReturnCreatorsCollection()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../Fixtures/getCreatorsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $characterData = $sut->getCreatorsFromComic(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection', $characterData);
    }

    /**
     * when: getStoriesFromComic
     * with: AComicId
     * should: clientReturnStoriesCollection
     */
    public function test_getStoriesFromComic_ACharacterId_clientReturnStoriesCollection()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../Fixtures/getStoriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new ComicsRepository($this->client);
        $characterData = $sut->getStoriesFromComic(1011334, $this->queryMock);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\StoriesCollection', $characterData);
    }
}
