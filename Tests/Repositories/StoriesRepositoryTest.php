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


use Octante\MarvelAPIBundle\Repositories\StoriesRepository;

class StoriesRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMockBuilder('Octante\MarvelAPIBundle\Lib\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Model\Query\StoryQuery')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * when: getStoryIsCalled
     * with: withAQuery
     * should: callSendMethodFromClientClass
     */
    function test_getStoryIsCalled_withAQuery_callSendMethodFromClientClass()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEmptyStoriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new StoriesRepository($this->client);
        $sut->getStories($this->queryMock);
    }

    /**
     * when: getStoryIsCalled
     * with: withAQuery
     * should: clientReturnStoriesCollection
     */
    function test_getStoryIsCalled_withAQuery_clientReturnStoriesCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getStoriesCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new StoriesRepository($this->client);
        $sut->getStories($this->queryMock);
    }

    /**
     * when: getStoriesByIdIsCalled
     * with: withAStoryId
     * should: clientReturnStoryCollection
     */
    function test_getStoriesByIdIsCalled_withAStoryId_clientReturnStoryCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getStory.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new StoriesRepository($this->client);
        $storiesData = $sut->getStoryById(1011334);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Collections\StoriesCollection', $storiesData);
    }
}
 