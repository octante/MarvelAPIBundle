<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Model\Entities;


use Octante\MarvelAPIBundle\Model\Lists\ComicList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;;
use Octante\MarvelAPIBundle\Model\ValueObjects\CreatorId;
use Octante\MarvelAPIBundle\Model\ValueObjects\Image;

class Creator
{
    /**
     * The unique ID of the comic resource.,
     *
     * @var int
     */
    private $id;

    /**
     * The first name of the creator.,
     *
     * @var string
     */
    private $firstName;

    /**
     * The middle name of the creator.,
     *
     * @var string
     */
    private $middleName;

    /**
     * The last name of the creator.
     *
     * @var string
     */
    private $lastName;

    /**
     * The suffix or honorific for the creator.
     *
     * @var string
     */
    private $suffix;

    /**
     * The full name of the creator (a space-separated concatenation of the above four fields).
     *
     * @var string
     */
    private $fullName;

    /**
     * The date the resource was most recently modified.
     *
     * @var string
     */
    private $modified;

    /**
     * The canonical URL identifier for this resource.
     *
     * @var string
     */
    private $resourceURI;

    /**
     * A set of public web site URLs for the resource.
     *
     * @var array
     */
    private $urls;

    /**
     * The representative image for this creator.
     *
     * @var Image
     */
    private $thumbnails;

    /**
     * A resource list containing comics which feature this character.,
     *
     * @var ComicList
     */
    private $comics;

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
     * A summary representation of the series to which this comic belongs.,
     *
     * @var SerieSummary
     */
    private $series;

    /**
     * @param CreatorId $characterId
     *
     * @internal param $creatorId
     */
    private function __construct(CreatorId $characterId)
    {
        $this->id = $characterId;
    }

    /**
     * @param CreatorId $creatorId
     *
     * @return Creator
     */
    public static function create(CreatorId $creatorId)
    {
        return new Creator($creatorId);
    }

    /**
     * @param ComicList $comics
     */
    public function setComics($comics)
    {
        $this->comics = $comics;
    }

    /**
     * @return ComicList
     */
    public function getComics()
    {
        return $this->comics;
    }

    /**
     * @param EventList $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @return EventList
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param string $resourceURI
     */
    public function setResourceURI($resourceURI)
    {
        $this->resourceURI = $resourceURI;
    }

    /**
     * @return string
     */
    public function getResourceURI()
    {
        return $this->resourceURI;
    }

    /**
     * @param SerieSummary $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @return SerieSummary
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param StoryList $stories
     */
    public function setStories($stories)
    {
        $this->stories = $stories;
    }

    /**
     * @return StoryList
     */
    public function getStories()
    {
        return $this->stories;
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param Image $thumbnails
     */
    public function setThumbnails($thumbnails)
    {
        $this->thumbnails = $thumbnails;
    }

    /**
     * @return Image
     */
    public function getThumbnails()
    {
        return $this->thumbnails;
    }

    /**
     * @param array $urls
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->urls;
    }
} 