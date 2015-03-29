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
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\CharacterId;
use Octante\MarvelAPIBundle\Model\ValueObjects\Image;

class Character
{
    /**
     * The unique ID of the comic resource.,
     *
     * @var int
     */
    private $id;

    /**
     * The name of the character.,
     *
     * @var string
     */
    private $name;

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
     * The representative image for this comic.,
     *
     * @var Image
     */
    private $thumbnail;

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
     * @param $characterId
     */
    private function __construct(CharacterId $characterId)
    {
        $this->id = $characterId;
    }

    /**
     * @param CharacterId $characterId
     *
     * @return Character
     */
    public static function create(CharacterId $characterId)
    {
        return new Character($characterId);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return EventList
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @return Image
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @return ComicList
     */
    public function getComics()
    {
        return $this->comics;
    }

    /**
     * @param \Octante\MarvelAPIBundle\Lists\ComicList $comics
     */
    public function setComics($comics)
    {
        $this->comics = $comics;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param \Octante\MarvelAPIBundle\Lists\EventList $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $resourceURI
     */
    public function setResourceURI($resourceURI)
    {
        $this->resourceURI = $resourceURI;
    }

    /**
     * @param \Octante\MarvelAPIBundle\Summaries\SerieSummary $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @param \Octante\MarvelAPIBundle\Lists\StoryList $stories
     */
    public function setStories($stories)
    {
        $this->stories = $stories;
    }

    /**
     * @param \Octante\MarvelAPIBundle\ValueObjects\Image $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @param array $urls
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
    }
} 