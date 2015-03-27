<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 27/3/15
 * Time: 17:42
 */

namespace Query;


use Octante\MarvelAPIBundle\Model\Query\BaseURL;

class BaseURLTest extends \PHPUnit_Framework_TestCase
{
    const BASE_URL = 'http://gateway.marvel.com:80/v1/public/';

    /**
     * when: createBaseUrl
     * with: ThreeParameters
     * should: returnCorrectlyURL
     */
    public function test_createBaseUrl_ThreeParameters_returnCorrectlyURL()
    {
        $baseURL = BaseURL::create('filter', 1245, 'resource');
        $expected = BaseURLTest::BASE_URL . 'filter/1245/resource';
        $this->assertEquals($expected, $baseURL->getURL());
    }

    /**
     * when: createBaseUrl
     * with: OnlyFilterParameter
     * should: returnUrlWithFilterParameter
     */
    function test_createBaseUrl_OnlyFilterParameter_returnUrlWithFilterParameter()
    {
        $baseURL = BaseURL::create('filter');
        $expected = BaseURLTest::BASE_URL . 'filter';
        $this->assertEquals($expected, $baseURL->getURL());
    }

    /**
     * when: createBaseUrl
     * with: OnlyWithFilterAndIdParameters
     * should: returnUrlWithFilterAndIdParameters
     */
    function test_createBaseUrl_OnlyWithFilterAndIdParameters_returnUrlWithFilterAndIdParameters()
    {
        $baseURL = BaseURL::create('filter', 1245);
        $expected = BaseURLTest::BASE_URL . 'filter/1245';
        $this->assertEquals($expected, $baseURL->getURL());
    }

    /**
     * when: createBaseUrl
     * with: OnlyFilterAndResourceParameter
     * should: throwAnException
     *
     * @expectedException \InvalidArgumentException
     */
    function test_createBaseUrl_OnlyFilterAndResourceParameter_throwAnException()
    {
        $baseURL = BaseURL::create('filter', null, 'resource');
        $baseURL->getURL();
    }
}
 