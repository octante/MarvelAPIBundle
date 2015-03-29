<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lists;


use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\Summaries\StorySummary;

class StoryListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createdIsCalled
     * with: validParameters
     * should: returnStoryListInstance
     */
    function test_createdIsCalled_validParameters_returnStoryListInstance()
    {
        $sut = StoryList::create(
            1,
            2,
            'collection uri',
            array()
        );

        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Lists\StoryList', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = StoryList::create(
            1,
            2,
            'collection_uri',
            array()
        );
        $this->assertEquals(1, $sut->getAvailable());
        $this->assertEquals(2, $sut->getReturned());
        $this->assertEquals('collection_uri', $sut->getCollectionURI());
        $this->assertEquals(array(), $sut->getItems());
    }

    /**
     * when: createIsCalled
     * with: notEmptyItems
     * should: returnCharactersSummary
     */
    function test_createIsCalled_notEmptyItems_returnCharactersSummary()
    {
        $charactersSummary = array(
            array(
                'resourceURI' => 'resource_uri_1',
                'name' => 'name_1',
                'type' => 'type_1'
            ),
            array(
                'resourceURI' => 'resource_uri_2',
                'name' => 'name_2',
                'type' => 'type_2'
            )
        );

        $sut = StoryList::create(
            1,
            2,
            'collection_uri',
            $charactersSummary
        );

        $expected = array(
            StorySummary::create('resource_uri_1', 'name_1', 'type_1'),
            StorySummary::create('resource_uri_2', 'name_2', 'type_2')
        );

        $res = $sut->getItems();
        $this->assertEquals($expected, $res);
    }
}
 