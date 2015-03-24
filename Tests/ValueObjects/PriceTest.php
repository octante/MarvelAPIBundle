<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:52
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\ValueObjects\Price;

class PriceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: crateIsCalled
     * with: validParameters
     * should: returnPriceInstance
     */
    function test_crateIsCalled_validParameters_returnPriceInstance()
    {
        $sut = Price::create('type', 10.99);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\Price', $sut);
    }

    /**
     * when: createIsCalled
     * with: validParameters
     * should: parametersHasBeenSettedCorrectly
     */
    function test_createIsCalled_validParameters_parametersHasBeenSettedCorrectly()
    {
        $sut = Price::create('type', 10.99);
        $this->assertEquals('type', $sut->getType());
        $this->assertEquals(10.99, $sut->getPrice());
    }

    /**
     * when: createIsCalled
     * with: invalidPrice
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Price has an invalid format "invalid_price"
     */
    function test_createIsCalled_invalidPrice_throwAnException()
    {
        Price::create('type', 'invalid_price');
    }

    /**
     * when: createIsCalled
     * with: invalidPriceAsString
     * should: worksCorrectly
     */
    function test_createIsCalled_invalidPriceAsString_worksCorrectly()
    {
        Price::create('type', '10.99');
    }
}
 