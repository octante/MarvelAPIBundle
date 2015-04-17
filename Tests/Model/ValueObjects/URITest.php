<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValueObjects;

use Octante\MarvelAPIBundle\Model\ValueObjects\URI;

class URITest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: returnURIInstance
     */
    public function test_createIsCalled_withValidParameters_returnURIInstance()
    {
        $sut = URI::create('uri');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\URI', $sut);
    }

    /**
     * when: createdIsCalled
     * with: withValidParameters
     * should: parametersHasBeenSetted
     */
    public function test_createdIsCalled_withValidParameters_parametersHasBeenSetted()
    {
        $sut = URI::create('uri');
        $this->assertEquals('uri', $sut->getUri());
    }
}
