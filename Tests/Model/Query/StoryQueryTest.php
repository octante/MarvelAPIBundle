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


use Octante\MarvelAPIBundle\Model\Query\SerieQuery;
use Octante\MarvelAPIBundle\Model\Query\StoryQuery;

class StoryQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: getQueryIsCalled
     * with: WithAllParameters
     * should: queryStringIsBuildCorrectly
     */
    function test_getQueryIsCalled_WithAllParameters_queryStringIsBuildCorrectly()
    {
        $sut = new StoryQuery();
        $sut->setModifiedSince('2015-03-25');
        $sut->setComics("37047,37048");
        $sut->setSeries("37041,37041");
        $sut->setEvents("93947,93946");
        $sut->setCreators("2707,2708");
        $sut->setCharacters("1010370,1010371");
        $sut->setOrderBy(SerieQuery::ORDER_BY_NAME);
        $sut->setLimit(10);
        $sut->setOffset(0);

        $url = $sut->getQuery();
        $expected = "modifiedSince=2015-03-25&comics=37047,37048&series=37041,37041&events=93947,93946&".
                    "creators=2707,2708&characters=1010370,1010371&orderBy=title&limit=10&offset=0";

        $this->assertEquals($expected, $url);
    }
}
 