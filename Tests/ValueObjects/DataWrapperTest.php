<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:29
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\ValueObjects\DataWrapper;

class DataWrapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: calledCreateMethod
     * with: withValidParameters
     * should: DataWrapperInstanceIsReturned
     */
    function test_calledCreateMethod_withValidParameters_DataWrapperInstanceIsReturned()
    {
        $dataContainerMock = $this->getDataConteinerMock();

        $sut = DataWrapper::create(
            200,
            "Ok",
            "copyright",
            "attribution text",
            "attribution HTML",
            $dataContainerMock,
            "etag"
        );

        $this->assertInstanceOf('Octante\MarvelAPIBundle\ValueObjects\DataWrapper', $sut);
    }

    /**
     * when: calledCreateMethod
     * with: withValidParameters
     * should: argumentsHasBeenSetted
     */
    function test_calledCreateMethod_withValidParameters_argumentsHasBeenSetted()
    {
        $dataContainerMock = $this->getDataConteinerMock();

        $sut = DataWrapper::create(
            200,
            "Ok",
            "copyright",
            "attribution text",
            "attribution HTML",
            $dataContainerMock,
            "etag"
        );

        $this->assertEquals(200, $sut->getCode());
        $this->assertEquals("Ok", $sut->getStatus());
        $this->assertEquals("copyright", $sut->getCopyright());
        $this->assertEquals("attribution text", $sut->getAttributionText());
        $this->assertEquals("attribution HTML", $sut->getAttributionHTML());
        $this->assertEquals("etag", $sut->getEtag());
    }

    /**
     * @return mixed
     */
    private function getDataConteinerMock()
    {
        $dataContainerMock = $this->getMockBuilder('Octante\MarvelAPIBundle\DataContainer\DataContainer')
            ->disableOriginalConstructor()
            ->getMock();
        return $dataContainerMock;
    }
}
 