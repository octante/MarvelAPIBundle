<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Octante\MarvelAPIBundle\Model\Collections\CharactersCollection;

class CharactersCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * when: hidrateIsCalled
     * with: charactersCollectionJSONData
     * should: constructCharactersDataWrapper
     */
    public function test_hidrateIsCalled_charactersCollectionJSONData_constructCharactersDataWrapper()
    {
        $jsonResponse = file_get_contents(__DIR__ . '/../../Fixtures/getCharactersCollection.json');

        $sut = CharactersCollection::create(json_decode($jsonResponse, true));
        $result = $sut->getCharactersDataWrapper();

        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\DataWrapper', $result);

        $this->assertNotNull($result->getData());
        $this->assertEquals(200, $result->getCode());
        $this->assertEquals("Ok", $result->getStatus());
        $this->assertEquals("© 2015 MARVEL", $result->getCopyright());
        $this->assertEquals("Data provided by Marvel. © 2015 MARVEL", $result->getAttributionText());
        $this->assertEquals("<a href=\"http://marvel.com\">Data provided by Marvel. © 2015 MARVEL</a>", $result->getAttributionHTML());
    }
}
