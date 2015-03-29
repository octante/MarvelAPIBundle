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


use Octante\MarvelAPIBundle\Model\ValueObjects\TextObject;

class TextObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: TextObjectInstanceIsReturned
     */
    function test_createIsCalled_withValidParameters_TextObjectInstanceIsReturned()
    {
        $sut = TextObject::create('type', 'language', 'text');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\TextObject', $sut);
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_withValidParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = TextObject::create('type', 'language', 'text');
        $this->assertEquals('type', $sut->getType());
        $this->assertEquals('language', $sut->getLanguage());
        $this->assertEquals('text', $sut->getText());
    }
}
 