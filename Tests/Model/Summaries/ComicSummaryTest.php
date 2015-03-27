<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 1:46
 */

namespace Summaries;


use Octante\MarvelAPIBundle\Model\Summaries\ComicSummary;

class ComicSummaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: validParameters
     * should: EventSummaryIsReturned
     */
    function test_createIsCalled_validParameters_SerieSummaryIsReturned()
    {
        $sut = ComicSummary::create('resource_uri', 'name');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Summaries\ComicSummary', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = ComicSummary::create('resource_uri', 'name');
        $this->assertEquals('resource_uri', $sut->getResourceURI());
        $this->assertEquals('name', $sut->getName());
    }
}
 