<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Query;


use Octante\MarvelAPIBundle\Model\Query\EventQuery;

class EventQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: getQueryIsCalled
     * with: WithAllParameters
     * should: queryStringIsBuildCorrectly
     */
    function test_getQueryIsCalled_WithAllParameters_queryStringIsBuildCorrectly()
    {
        $sut = new EventQuery();
        $sut->setName('Acts of Vengeance!');
        $sut->setNameStartsWith("Acts");
        $sut->setModifiedSince('2015-03-25');
        $sut->setCreators("2707,2708");
        $sut->setCharacters("1010370,1010371");
        $sut->setSeries("3374,3375");
        $sut->setComics("37047,37048");
        $sut->setStories("3370,3369");

        $sut->setOrderBy(EventQuery::ORDER_BY_MINUS_NAME);
        $sut->setLimit(10);
        $sut->setOffset(0);

        $url = $sut->getQuery();
        $expected = "name=Acts of Vengeance!&nameStartsWith=Acts&modifiedSince=2015-03-25&creators=2707,2708&".
                    "characters=1010370,1010371&series=3374,3375&comics=37047,37048&stories=3370,3369&orderBy=-name&".
                    "limit=10&offset=0";

        $this->assertEquals($expected, $url);
    }
}
 