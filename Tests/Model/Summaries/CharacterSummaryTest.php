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

use Octante\MarvelAPIBundle\Model\Summaries\CharacterSummary;

class CharacterSummaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: validParameters
     * should: CharactersSummaryIsReturned
     */
    public function test_createIsCalled_validParameters_CharactersSummaryIsReturned()
    {
        $sut = CharacterSummary::create('resource_uri', 'name', 'role');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\Summaries\CharacterSummary', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    public function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = CharacterSummary::create('resource_uri', 'name', 'role');
        $this->assertEquals('resource_uri', $sut->getResourceURI());
        $this->assertEquals('name', $sut->getName());
        $this->assertEquals('role', $sut->getRole());
    }
}
