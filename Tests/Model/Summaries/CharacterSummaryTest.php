<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 1:38
 */

namespace Summaries;


use Octante\MarvelAPIBundle\Model\Summaries\CharacterSummary;

class CharacterSummaryTest extends \PHPUnit_Framework_TestCase 
{
    /**
     * when: createIsCalled
     * with: validParameters
     * should: CharactersSummaryIsReturned
     */
    function test_createIsCalled_validParameters_CharactersSummaryIsReturned()
    {
        $sut = CharacterSummary::create('resource_uri', 'name', 'role');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Summaries\CharacterSummary', $sut);
    }
    
    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = CharacterSummary::create('resource_uri', 'name', 'role');
        $this->assertEquals('resource_uri', $sut->getResourceURI());
        $this->assertEquals('name', $sut->getName());
        $this->assertEquals('role', $sut->getRole());
    }
}
 