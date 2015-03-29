<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;

class ThumbnailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: ImageInstanceIsReturned
     */
    function test_createIsCalled_withValidParameters_ImageInstanceIsReturned()
    {
        $sut = Thumbnail::create('path', 'extension');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\Image', $sut);
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_withValidParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = Thumbnail::create('path', 'extension');
        $this->assertEquals('path', $sut->getPath());
        $this->assertEquals('extension', $sut->getExtension());
    }
}
 