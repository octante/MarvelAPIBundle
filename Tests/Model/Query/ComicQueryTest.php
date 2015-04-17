<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Query;

use Octante\MarvelAPIBundle\Model\Query\ComicQuery;

class ComicQueryTest extends \PHPUnit_Framework_TestCase
{
    const EVENTS_IDS = "1234,1235";
    const EAN = "9780785 163909 51999";
    const DIGITALID = 0;
    const DIAMOND_CODE = "MAR150656";
    const ISBN = "978-0-7851-6390-9";
    const ISSN = "2049-3630";
    const ISSUENUMBER = 0;
    const MODIFIEDSINCE = '2015-03-25';
    const NOVARIANTS = true;
    const SERIES = "15481,15482";
    const SHARED_APPEARANCES = "Spider-Man, Wolverine";
    const STORIES = "93946,93945";
    const STARTYEAR = 2004;
    const TITLE = 'Spider-Man';
    const STARTS_WITH = 'Spider';
    const UPC = 75960608226100111;
    const CREATORS = '4430,4431';
    const CHARACTERS = '52303,52301';
    const DATE_DESCRIPTOR = '2015-03-25';
    const DATERANGE = '2015-03-25';

    /**
     * when: getQueryIsCalled
     * with: WithAllParameters
     * should: queryStringIsBuildCorrectly
     */
    public function test_getQueryIsCalled_WithAllParameters_queryStringIsBuildCorrectly()
    {
        $sut = new ComicQuery();
        $sut->setCharacters(self::CHARACTERS);
        $sut->setCollaborators(self::CREATORS);
        $sut->setCreators(self::CREATORS);
        $sut->setDateDescriptor(self::DATE_DESCRIPTOR);
        $sut->setDateRange(self::DATERANGE);
        $sut->setDiamondCode(self::DIAMOND_CODE);
        $sut->setDigitalId(self::DIGITALID);
        $sut->setEan(self::EAN);
        $sut->setEvents(self::EVENTS_IDS);
        $sut->setFormat('comic');
        $sut->setFormatType(ComicQuery::FORMAT_TYPE_COMIC);
        $sut->setHasDigitalIssue(self::NOVARIANTS);
        $sut->setIsbn(self::ISBN);
        $sut->setIssn(self::ISSN);
        $sut->setIssueNumber(self::ISSUENUMBER);
        $sut->setModifiedSince(self::MODIFIEDSINCE);
        $sut->setNoVariants(self::NOVARIANTS);
        $sut->setSeries(self::SERIES);
        $sut->setSharedAppearances(self::SHARED_APPEARANCES);
        $sut->setStartYear(self::STARTYEAR);
        $sut->setStories(self::STORIES);
        $sut->setTitle(self::TITLE);
        $sut->setTitleStartsWith(self::STARTS_WITH);
        $sut->setUpc(self::UPC);

        $sut->setOrderBy(ComicQuery::ORDER_BY_FOC_DATE);
        $sut->setLimit(10);
        $sut->setOffset(0);

        $url = $sut->getQuery();

        $expected = "characters=52303,52301&collaborators=4430,4431&creators=4430,4431&dateDescriptor=2015-03-25&" .
                        "dateRange=2015-03-25&diamondCode=MAR150656&digitalId=0&ean=9780785 163909 51999&" .
                        "events=1234,1235&format=comic&formatType=comic&hasDigitalIssue=1&isbn=978-0-7851-6390-9&" .
                        "issn=2049-3630&issueNumber=0&modifiedSince=2015-03-25&noVariants=1&series=15481,15482&" .
                        "sharedAppearances=Spider-Man, Wolverine&startYear=2004&stories=93946,93945&title=Spider-Man&" .
                        "titleStartsWith=Spider&upc=75960608226100111&orderBy=focDate&limit=10&offset=0";

        $this->assertEquals($expected, $url);
    }
}
