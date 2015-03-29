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


use Octante\MarvelAPIBundle\Model\ValueObjects\Price;

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
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\Price', $sut);
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
 