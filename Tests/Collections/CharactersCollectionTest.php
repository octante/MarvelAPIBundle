<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 12:41
 */

use Octante\MarvelAPIBundle\Collections\CharactersCollection;

class CharactersCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * when: hidrateIsCalled
     * with: charactersCollectionJSONData
     * should: constructCharactersDataWrapper
     */
    function test_hidrateIsCalled_charactersCollectionJSONData_constructCharactersDataWrapper()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../Fixtures/getCharactersCollection.json');

        $sut = CharactersCollection::create(json_decode($jsonResponse, true));
        $result = $sut->getCharactersDataWrapper();

        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\DataWrapper', $result);

        $this->assertNotNull($result->getData());
        $this->assertEquals(200, $result->getCode());
        $this->assertEquals("Ok", $result->getStatus());
        $this->assertEquals("© 2015 MARVEL", $result->getCopyright());
        $this->assertEquals("Data provided by Marvel. © 2015 MARVEL", $result->getAttributionText());
        $this->assertEquals("<a href=\"http://marvel.com\">Data provided by Marvel. © 2015 MARVEL</a>", $result->getAttributionHTML());
    }
}