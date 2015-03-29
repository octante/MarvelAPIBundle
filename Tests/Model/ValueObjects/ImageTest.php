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


use Octante\MarvelAPIBundle\Model\ValueObjects\Image;

class ImageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: ImageInstanceIsReturned
     */
    function test_createIsCalled_withValidParameters_ImageInstanceIsReturned()
    {
        $sut = Image::create('file_name', 'file_extension');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\Image', $sut);
    }

    /**
     * when: createIsCalled
     * with: withValidParametes
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_withValidParametes_parametersHasBeenSettedCorrectly()
    {
        $sut = Image::create('file_name', 'file_extension');
        $this->assertEquals('file_name', $sut->getPath());
        $this->assertEquals('file_extension', $sut->getExtension());
    }
}
 