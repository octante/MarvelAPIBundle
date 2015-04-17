<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lists;

use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Summaries\CharacterSummary;

class CharacterListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createdIsCalled
     * with: validParameters
     * should: returnCharacterListInstance
     */
    public function test_createdIsCalled_validParameters_returnCharacterListInstance()
    {
        $sut = CharacterList::create(
            1,
            2,
            'collection uri',
            []
        );

        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Lists\CharacterList', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    public function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = CharacterList::create(
            1,
            2,
            'collection_uri',
            []
        );
        $this->assertEquals(1, $sut->getAvailable());
        $this->assertEquals(2, $sut->getReturned());
        $this->assertEquals('collection_uri', $sut->getCollectionURI());
        $this->assertEquals([], $sut->getItems());
    }

    /**
     * when: createIsCalled
     * with: notEmptyItems
     * should: returnCharactersSummary
     */
    public function test_createIsCalled_notEmptyItems_returnCharactersSummary()
    {
        $charactersSummary = [
            [
                'resourceURI' => 'resource_uri_1',
                'name' => 'name_1',
                'role' => 'role_1',
            ],
            [
                'resourceURI' => 'resource_uri_2',
                'name' => 'name_2',
                'role' => 'role_2',
            ],
        ];

        $sut = CharacterList::create(
            1,
            2,
            'collection_uri',
            $charactersSummary
        );

        $expected = [
            CharacterSummary::create('resource_uri_1', 'name_1', 'role_1'),
            CharacterSummary::create('resource_uri_2', 'name_2', 'role_2'),
        ];

        $res = $sut->getItems();
        $this->assertEquals($expected, $res);
    }
}
