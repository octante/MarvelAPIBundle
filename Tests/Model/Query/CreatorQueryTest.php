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

use Octante\MarvelAPIBundle\Model\Query\CreatorQuery;

class CreatorQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: getQueryIsCalled
     * with: WithAllParameters
     * should: queryStringIsBuildCorrectly
     */
    public function test_getQueryIsCalled_WithAllParameters_queryStringIsBuildCorrectly()
    {
        $sut = new CreatorQuery();
        $sut->setFirstName('Dean');
        $sut->setMiddleName('Johnson');
        $sut->setLastName('Zachary');
        $sut->setSuffix("Sr");
        $sut->setNameStartsWith("D");
        $sut->setFirstNameStartsWith("D");
        $sut->setMiddleNameStartsWith("J");
        $sut->setLastNameStartsWith("Z");
        $sut->setModifiedSince('2015-03-25');
        $sut->setComics("37047,37048");
        $sut->setSeries("3374,3375");
        $sut->setEvents("3371,3372");
        $sut->setStories("3370,3369");

        $sut->setOrderBy(CreatorQuery::ORDER_BY_MINUS_MODIFIED);
        $sut->setLimit(10);
        $sut->setOffset(0);

        $url = $sut->getQuery();
        $expected = "firstName=Dean&middleName=Johnson&lastName=Zachary&suffix=Sr&nameStartsWith=D&" .
                    "firstNameStartsWith=D&middleNameStartsWith=J&lastNameStartsWith=Z&modifiedSince=2015-03-25&" .
                    "comics=37047,37048&series=3374,3375&events=3371,3372&stories=3370,3369&orderBy=-modified&limit=10&" .
                    "offset=0";

        $this->assertEquals($expected, $url);
    }
}
