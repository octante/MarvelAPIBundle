<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 1:18
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\ValueObjects\Thumbnail;

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
        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\Image', $sut);
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
 