<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 1:42
 */

namespace Summaries;


use Octante\MarvelAPIBundle\Model\Summaries\StorySummary;

class StorySummaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: validParameters
     * should: StorySummaryInstanceIsReturned
     */
    function test_createIsCalled_validParameters_StorySummaryInstanceIsReturned()
    {
        $sut = StorySummary::create('resource_uri', 'name', 'role');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Summaries\StorySummary', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = StorySummary::create('resource_uri', 'name', 'type');
        $this->assertEquals('resource_uri', $sut->getResourceURI());
        $this->assertEquals('name', $sut->getName());
        $this->assertEquals('type', $sut->getType());
    }
}
 