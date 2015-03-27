<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 1:44
 */

namespace Summaries;


use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;

class SerieSummaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: validParameters
     * should: SerieSummaryIsReturned
     */
    function test_createIsCalled_validParameters_SerieSummaryIsReturned()
    {
        $sut = SerieSummary::create('resource_uri', 'name');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Summaries\SerieSummary', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = SerieSummary::create('resource_uri', 'name');
        $this->assertEquals('resource_uri', $sut->getResourceURI());
        $this->assertEquals('name', $sut->getName());
    }
}
 