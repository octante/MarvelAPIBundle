<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 22/3/15
 * Time: 19:16
 */

namespace Octante\MarvelAPIBundle\Tests\Repositories;


use Octante\MarvelAPIBundle\Repositories\CharactersRepository;

class CharacterRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $queryMock;

    public function setUp()
    {
        $this->client = $this->getMock('Octante\MarvelAPIBundle\Lib\Client');
        $this->queryMock = $this->getMockBuilder('Octante\MarvelAPIBundle\Query\CharacterQuery')
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
}
 