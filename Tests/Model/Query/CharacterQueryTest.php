<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 25/3/15
 * Time: 14:02
 */

namespace Query;


use Octante\MarvelAPIBundle\Model\Query\CharacterQuery;

class CharacterQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: getQueryIsCalled
     * with: WithAllParameters
     * should: queryStringIsBuildCorrectly
     */
    function test_getQueryIsCalled_WithAllParameters_queryStringIsBuildCorrectly()
    {
        $sut = new CharacterQuery();
        $sut->setName('Zzzax');
        $sut->setNameStartsWith('Zzz');
        $sut->setModifiedSince('2015-03-25');
        $sut->setComics("37047,37048");
        $sut->setSeries("3374,3375");
        $sut->setEvents("3371,3372");
        $sut->setStories("3370,3369");

        $sut->setOrderBy(CharacterQuery::ORDER_BY_MINUS_MODIFIED);
        $sut->setLimit(10);
        $sut->setOffset(0);

        $url = $sut->getQuery();
        $expected = "name=Zzzax&nameStartsWith=Zzz&modifiedSince=2015-03-25&comics=37047,37048&series=3374,3375&".
                    "events=3371,3372&stories=3370,3369&orderBy=-modified&limit=10&offset=0";

        $this->assertEquals($expected, $url);


    }
}
 