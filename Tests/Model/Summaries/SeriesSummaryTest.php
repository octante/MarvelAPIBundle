<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Summaries;

use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;

class SeriesSummaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: validParameters
     * should: SerieSummaryIsReturned
     */
    public function test_createIsCalled_validParameters_SerieSummaryIsReturned()
    {
        $sut = SerieSummary::create('resource_uri', 'name');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Summaries\SerieSummary', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    public function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = SerieSummary::create('resource_uri', 'name');
        $this->assertEquals('resource_uri', $sut->getResourceURI());
        $this->assertEquals('name', $sut->getName());
    }
}
