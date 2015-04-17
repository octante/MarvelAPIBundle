<?php

/*
 * This file is part of the OctanteMarvelAPI package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Entities;

use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Lists\CreatorList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\ComicId;
use Octante\MarvelAPIBundle\Model\ValueObjects\Image;

class Comic
{
    /**
     * The unique ID of the comic resource.,
     *
     * @var int
     */
    private $id;

    /**
     * The ID of the digital comic representation of this comic. Will be 0 if the comic is not available digitally.,
     *
     * @var int
     */
    private $digitalId;

    /**
     * The canonical title of the comic.,
     *
     * @var string
     */
    private $title;

    /**
     * The number of the issue in the series (will generally be 0 for collection formats).,
     *
     * @var float
     */
    private $issueNumber;

    /**
     * If the issue is a variant (e.g. an alternate cover, second printing, or director’s cut), a text description of the variant.,
     *
     * @var string
     */
    private $variantDescription;

    /**
     * The preferred description of the comic.,
     *
     * @var string
     */
    private $description;

    /**
     * The date the resource was most recently modified.,
     *
     * @var \DateTime
     */
    private $modified;

    /**
     * The ISBN for the comic (generally only populated for collection formats).,
     *
     * @var string
     */
    private $isbn;

    /**
     * The UPC barcode number for the comic (generally only populated for periodical formats).,
     *
     * @var string
     */
    private $upc;

    /**
     * The Diamond code for the comic.,
     *
     * @var string
     */
    private $diamondCode;

    /**
     * The EAN barcode for the comic.,
     *
     * @var string
     */
    private $ean;

    /**
     * The ISSN barcode for the comic.,
     *
     * @var string
     */
    private $issn;

    /**
     * The publication format of the comic e.g. comic, hardcover, trade paperback.,
     *
     * @var string
     */
    private $format;

    /**
     * The number of story pages in the comic.,
     *
     * @var int
     */
    private $pageCount;

    /**
     * A set of descriptive text blurbs for the comic.,
     *
     * @var array
     */
    private $textObjects;

    /**
     * The canonical URL identifier for this resource.,
     *
     * @var string
     */
    private $resourceURI;

    /**
     * A set of public web site URLs for the resource.,
     *
     * @var array
     */
    private $urls;

    /**
     * A summary representation of the series to which this comic belongs.,
     *
     * @var SerieSummary
     */
    private $series;

    /**
     * A list of variant issues for this comic (includes the "original" issue if the current issue is a variant).,
     *
     * @var array
     */
    private $variants;

    /**
     * A list of collections which include this comic (will generally be empty if the comic's format is a collection).,
     *
     * @var array
     */
    private $collections;

    /**
     * A list of issues collected in this comic (will generally be empty for periodical formats such as "comic" or "magazine").,
     *
     * @var array
     */
    private $collectedIssues;

    /**
     * A list of key dates for this comic.,
     *
     * @var array
     */
    private $dates;

    /**
     * A list of prices for this comic.,
     *
     * @var array
     */
    private $prices;

    /**
     * The representative image for this comic.,
     *
     * @var Image
     */
    private $thumbnail;

    /**
     * A list of promotional images associated with this comic.,
     *
     * @var array
     */
    private $images;

    /**
     * A resource list containing the creators associated with this comic.,
     *
     * @var CreatorList
     */
    private $creators;

    /**
     * A resource list containing the characters which appear in this comic.,
     *
     * @var CharacterList
     */
    private $characters;

    /**
     * A resource list containing the stories which appear in this comic.,
     *
     * @var StoryList
     */
    private $stories;

    /**
     * A resource list containing the events in which this comic appears.
     *
     * @var EventList
     */
    private $events;

    /**
     * @param CharacterList $characters
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

    /**
     * @param array $collectedIssues
     */
    public function setCollectedIssues($collectedIssues)
    {
        $this->collectedIssues = $collectedIssues;
    }

    /**
     * @param array $collections
     */
    public function setCollections($collections)
    {
        $this->collections = $collections;
    }

    /**
     * @param CreatorList $creators
     */
    public function setCreators($creators)
    {
        $this->creators = $creators;
    }

    /**
     * @param array $dates
     */
    public function setDates($dates)
    {
        $this->dates = $dates;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $diamondCode
     */
    public function setDiamondCode($diamondCode)
    {
        $this->diamondCode = $diamondCode;
    }

    /**
     * @param int $digitalId
     */
    public function setDigitalId($digitalId)
    {
        $this->digitalId = $digitalId;
    }

    /**
     * @param string $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @param EventList $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param array $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @param string $issn
     */
    public function setIssn($issn)
    {
        $this->issn = $issn;
    }

    /**
     * @param float $issueNumber
     */
    public function setIssueNumber($issueNumber)
    {
        $this->issueNumber = $issueNumber;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @param int $pageCount
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    /**
     * @param array $prices
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
    }

    /**
     * @param string $resourceURI
     */
    public function setResourceURI($resourceURI)
    {
        $this->resourceURI = $resourceURI;
    }

    /**
     * @param SerieSummary $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @param StoryList $stories
     */
    public function setStories($stories)
    {
        $this->stories = $stories;
    }

    /**
     * @param array $textObjects
     */
    public function setTextObjects($textObjects)
    {
        $this->textObjects = $textObjects;
    }

    /**
     * @param Image $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $upc
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
    }

    /**
     * @param array $urls
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
    }

    /**
     * @param string $variantDescription
     */
    public function setVariantDescription($variantDescription)
    {
        $this->variantDescription = $variantDescription;
    }

    /**
     * @param array $variants
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
    }

    /**
     * @param $comicId
     */
    private function __construct(ComicId $comicId)
    {
        $this->id = $comicId;
    }

    /**
     * @param ComicId $comicId
     *
     * @return Comic
     */
    public static function create(ComicId $comicId)
    {
        return new Comic($comicId);
    }

    /**
     * @return CharacterList
     */
    public function getCharacters()
    {
        return $this->characters;
    }

    /**
     * @return array
     */
    public function getCollectedIssues()
    {
        return $this->collectedIssues;
    }

    /**
     * @return array
     */
    public function getCollections()
    {
        return $this->collections;
    }

    /**
     * @return CreatorList
     */
    public function getCreators()
    {
        return $this->creators;
    }

    /**
     * @return array
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDiamondCode()
    {
        return $this->diamondCode;
    }

    /**
     * @return int
     */
    public function getDigitalId()
    {
        return $this->digitalId;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @return EventList
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getIssn()
    {
        return $this->issn;
    }

    /**
     * @return float
     */
    public function getIssueNumber()
    {
        return $this->issueNumber;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @return int
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @return array
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @return string
     */
    public function getResourceURI()
    {
        return $this->resourceURI;
    }

    /**
     * @return SerieSummary
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @return StoryList
     */
    public function getStories()
    {
        return $this->stories;
    }

    /**
     * @return array
     */
    public function getTextObjects()
    {
        return $this->textObjects;
    }

    /**
     * @return Image
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @return string
     */
    public function getVariantDescription()
    {
        return $this->variantDescription;
    }

    /**
     * @return array
     */
    public function getVariants()
    {
        return $this->variants;
    }
}
