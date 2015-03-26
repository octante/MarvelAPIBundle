<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 1:38
 */

namespace Summaries;


use Octante\MarvelAPIBundle\Model\Summaries\CreatorSummary;

class CreatorSummaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: validParameters
     * should: CreatorSummaryIsReturned
     */
    function test_createIsCalled_validParameters_CreatorSummaryIsReturned()
    {
        $sut = CreatorSummary::create('resource_uri', 'name', 'role');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Summaries\CreatorSummary', $sut);
    }
    
    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = CreatorSummary::create('resource_uri', 'name', 'role');
        $this->assertEquals('resource_uri', $sut->getResourceURI());
        $this->assertEquals('name', $sut->getName());
        $this->assertEquals('role', $sut->getRole());
    }
}
 