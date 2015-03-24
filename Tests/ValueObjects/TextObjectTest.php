<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:41
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\ValueObjects\TextObject;

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
        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\TextObject', $sut);
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
 