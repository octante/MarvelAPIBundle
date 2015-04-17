<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Query;

class ComicQuery extends Query
{
    const FORMAT_TYPE_COMIC = 'comic';
    const FORMAT_TYPE_COLLECTION = 'collection';

    const DATE_DESCRIPTOR_LAST_WEEK = 'lastWeek';
    const DATE_DESCRIPTOR_THIS_WEEK = 'thisWeek';
    const DATE_DESCRIPTOR_NEXT_WEEK = 'nextWeek';
    const DATE_DESCRIPTOR_THIS_MONTH = 'thisMonth';

    const ORDER_BY_FOC_DATE     = 'focDate';
    const ORDER_BY_ON_SALE_DATE = 'onsaleDate';
    const ORDER_BY_TITLE        = 'title';
    const ORDER_BY_ISSUE_NUMBER = 'issueNumber';

    /**
     * @param int $characters
     */
    public function setCharacters($characters)
    {
        $this->filters['characters'] = $characters;
    }

    /**
     * @param int $collaborators
     */
    public function setCollaborators($collaborators)
    {
        $this->filters['collaborators'] = $collaborators;
    }

    /**
     * @param int $creators
     */
    public function setCreators($creators)
    {
        $this->filters['creators'] = $creators;
    }

    /**
     * @param string $dateDescriptor
     */
    public function setDateDescriptor($dateDescriptor)
    {
        $this->filters['dateDescriptor'] = $dateDescriptor;
    }

    /**
     * @param int $dateRange
     */
    public function setDateRange($dateRange)
    {
        $this->filters['dateRange'] = $dateRange;
    }

    /**
     * @param string $diamondCode
     */
    public function setDiamondCode($diamondCode)
    {
        $this->filters['diamondCode'] = $diamondCode;
    }

    /**
     * @param int $digitalId
     */
    public function setDigitalId($digitalId)
    {
        $this->filters['digitalId'] = $digitalId;
    }

    /**
     * @param string $ean
     */
    public function setEan($ean)
    {
        $this->filters['ean'] = $ean;
    }

    /**
     * @param int $events
     */
    public function setEvents($events)
    {
        $this->filters['events'] = $events;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->filters['format'] = $format;
    }

    /**
     * @param string $formatType
     */
    public function setFormatType($formatType)
    {
        $this->filters['formatType'] = $formatType;
    }

    /**
     * @param boolean $hasDigitalIssue
     */
    public function setHasDigitalIssue($hasDigitalIssue)
    {
        $this->filters['hasDigitalIssue'] = $hasDigitalIssue;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->filters['isbn'] = $isbn;
    }

    /**
     * @param string $issn
     */
    public function setIssn($issn)
    {
        $this->filters['issn'] = $issn;
    }

    /**
     * @param int $issueNumber
     */
    public function setIssueNumber($issueNumber)
    {
        $this->filters['issueNumber'] = $issueNumber;
    }

    /**
     * @param \DateTime $modifiedSince
     */
    public function setModifiedSince($modifiedSince)
    {
        $this->filters['modifiedSince'] = $modifiedSince;
    }

    /**
     * @param boolean $noVariants
     */
    public function setNoVariants($noVariants)
    {
        $this->filters['noVariants'] = $noVariants;
    }

    /**
     * @param int $series
     */
    public function setSeries($series)
    {
        $this->filters['series'] = $series;
    }

    /**
     * @param int $sharedAppearances
     */
    public function setSharedAppearances($sharedAppearances)
    {
        $this->filters['sharedAppearances'] = $sharedAppearances;
    }

    /**
     * @param int $startYear
     */
    public function setStartYear($startYear)
    {
        $this->filters['startYear'] = $startYear;
    }

    /**
     * @param int $stories
     */
    public function setStories($stories)
    {
        $this->filters['stories'] = $stories;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->filters['title'] = $title;
    }

    /**
     * @param string $titleStartsWith
     */
    public function setTitleStartsWith($titleStartsWith)
    {
        $this->filters['titleStartsWith'] = $titleStartsWith;
    }

    /**
     * @param string $upc
     */
    public function setUpc($upc)
    {
        $this->filters['upc'] = $upc;
    }
}
