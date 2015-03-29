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

class SerieQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: getQueryIsCalled
     * with: WithAllParameters
     * should: queryStringIsBuildCorrectly
     */
    function test_getQueryIsCalled_WithAllParameters_queryStringIsBuildCorrectly()
    {
        $sut = new SerieQuery();
        $sut->setTitle('100th Anniversary Special (2014 - Present)');
        $sut->setTitleStartsWith("100");
        $sut->setModifiedSince('2015-03-25');
        $sut->setComics("37047,37048");
        $sut->setStories("3370,3369");
        $sut->setEvents("93947,93946");
        $sut->setCreators("2707,2708");
        $sut->setCharacters("1010370,1010371");
        $sut->setSeriesType(SerieQuery::SERIES_TYPES_COLLECTION);
        $sut->setContains(SerieQuery::CONTAINS_COMIC);
        $sut->setOrderBy(SerieQuery::ORDER_BY_NAME);
        $sut->setLimit(10);
        $sut->setOffset(0);

        $url = $sut->getQuery();
        $expected = "title=100th Anniversary Special (2014 - Present)&titleStartsWith=100&modifiedSince=2015-03-25&".
                    "comics=37047,37048&stories=3370,3369&events=93947,93946&creators=2707,2708&".
                    "characters=1010370,1010371&seriesType=collection&contains=comic&orderBy=title&limit=10&offset=0";

        $this->assertEquals($expected, $url);
    }
}
 