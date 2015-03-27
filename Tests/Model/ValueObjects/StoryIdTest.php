<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 24/3/15
 * Time: 0:02
 */

namespace ValueObjects;


use Octante\MarvelAPIBundle\Model\ValueObjects\StoryId;

class StoryIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: SerieIdObjectIsReturned
     */
    function test_createIsCalled_withValidParameters_StoryIdObjectIsReturned()
    {
        $sut = StoryId::create(12345);
        $this->assertInstanceOf('Octante\MarvelAPIBundle\Model\ValueObjects\StoryId', $sut);
    }

    /**
     * when: createIsCalled
     * with: withValidParameters
     * should: parametersHasBeenCorrectlySetted
     */
    function test_createIsCalled_withValidParameters_parametersHasBeenCorrectlySetted()
    {
        $sut = StoryId::create(12345);
        $this->assertEquals(12345, $sut->getStoryId());
    }

    /**
     * when: createIsCalled
     * with: withAnInvalidId
     * should: throwAnException
     *
     * @expectedException Octante\MarvelAPIBundle\Exceptions\InvalidStoryIdException
     */
    function test_createIsCalled_withAnInvalidId_throwAnException()
    {
        StoryId::create('an_invalid_comic_id');
    }
}
 