<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 23/3/15
 * Time: 12:41
 */

use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;

class ComicsCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * when: hidrateIsCalled
     * with: comicsCollectionJSONData
     * should: constructComicsDataWrapper
     */
    function test_hidrateIsCalled_comicsCollectionJSONData_constructComicsDataWrapper()
    {
        $jsonResponse = file_get_contents (__DIR__ . '/../../Fixtures/getComicsCollection.json');

        $sut = ComicsCollection::create(json_decode($jsonResponse, true));
        $result = $sut->getComicsDataWrapper();

        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper', $result);

        $this->assertNotNull($result->getData());
        $this->assertEquals(200, $result->getCode());
        $this->assertEquals("Ok", $result->getStatus());
        $this->assertEquals("© 2015 MARVEL", $result->getCopyright());
        $this->assertEquals("Data provided by Marvel. © 2015 MARVEL", $result->getAttributionText());
        $this->assertEquals("<a href=\"http://marvel.com\">Data provided by Marvel. © 2015 MARVEL</a>", $result->getAttributionHTML());
    }
}