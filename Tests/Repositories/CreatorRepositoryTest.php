<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 19:16
 */

namespace Octante\MarvelAPIBundle\Tests\Repositories;


use Octante\MarvelAPIBundle\Repositories\CreatorsRepository;

class CreatorRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMock('Octante\MarvelAPIBundle\Lib\Client');
        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Query\CreatorQuery')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * when: getCreatorIsCalled
     * with: withAQuery
     * should: callSendMethodFromClientClass
     */
    function test_getCreatorIsCalled_withAQuery_callSendMethodFromClientClass()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getEmptyCreatorsCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CreatorsRepository($this->client);
        $sut->getCreators($this->queryMock);
    }

    /**
     * when: getCreatorIsCalled
     * with: withAQuery
     * should: clientReturnCreatorCollection
     */
    function test_getCreatorIsCalled_withAQuery_clientReturnCreatorCollection()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCharactersCollection.json');

        $this->client
            ->expects($this->once())
            ->method('send')
            ->will($this->returnValue($jsonResponse));

        $sut = new CreatorsRepository($this->client);
        $sut->getCreators($this->queryMock);
    }
}
 