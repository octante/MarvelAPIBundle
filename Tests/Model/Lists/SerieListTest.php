<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 2:05
 */

namespace Lists;


use Octante\MarvelAPIBundle\Model\Lists\SerieList;
use Octante\MarvelAPIBundle\Model\Summaries\SeriesSummary;

class SerieListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createdIsCalled
     * with: validParameters
     * should: returnSerieListInstance
     */
    function test_createdIsCalled_validParameters_returnSerieListInstance()
    {
        $sut = SerieList::create(
            1,
            2,
            'collection uri',
            array()
        );

        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Lists\SerieList', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = SerieList::create(
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
        $seriesSummary = array(
            array(
                'resourceURI' => 'resource_uri_1',
                'name' => 'name_1'
            ),
            array(
                'resourceURI' => 'resource_uri_2',
                'name' => 'name_2'
            )
        );

        $sut = SerieList::create(
            1,
            2,
            'collection_uri',
            $seriesSummary
        );

        $expected = array(
            SeriesSummary::create('resource_uri_1', 'name_1'),
            SeriesSummary::create('resource_uri_2', 'name_2')
        );

        $res = $sut->getItems();
        $this->assertEquals($expected, $res);
    }
}
 