<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 1:28
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
    function test_createIsCalled_withValidParameters_returnURIInstance()
    {
        $sut = URI::create('uri');
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\URI', $sut);
    }

    /**
     * when: createdIsCalled
     * with: withValidParameters
     * should: parametersHasBeenSetted
     */
    function test_createdIsCalled_withValidParameters_parametersHasBeenSetted()
    {
        $sut = URI::create('uri');
        $this->assertEquals('uri', $sut->getUri());
    }
}
 