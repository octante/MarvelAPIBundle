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


use Octante\MarvelAPIBundle\Model\Lists\CharacterList;
use Octante\MarvelAPIBundle\Model\Lists\ComicList;
use Octante\MarvelAPIBundle\Model\Lists\CreatorList;
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Lists\StoryList;
use Octante\MarvelAPIBundle\Model\Summaries\EventSummary;
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\EventId;
use Octante\MarvelAPIBundle\Model\ValueObjects\Image;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;

class Event implements \JsonSerializable
{
    /**
     * The unique ID of the comic resource.,
     *
     * @var int
     */
    private $id;

    /**
     * The title of the event
     *
     * @var string
     */
    private $title;

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
     * The date of publication of the first issue in this event.,
     *
     * @var string
     */
    private $start;

    /**
     * The date of publication of the last issue in this event.,
     *
     * @var string
     */
    private $end;

    /**
     * The representative image for this comic.,
     *
     * @var Thumbnail
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
     * A resource list containing the characters which appear in this event.
     *
     * @var CharacterList
     */
    private $characters;

    /**
     * A resource list containing creators whose work appears in this event.
     *
     * @var CreatorList
     */
    private $creators;

    /**
     * A summary representation of the series to which this comic belongs.,
     *
     * @var SerieSummary
     */
    private $series;

    /**
     * A summary representation of the event which follows this event.
     *
     * @var EventSummary
     */
    private $next;

    /**
     * A summary representation of the event which preceded this event
     *
     * @var EventSummary
     */
    private $previous;

    /**
     * @param $eventId
     */
    private function __construct(EventId $eventId)
    {
        $this->id = $eventId;
    }

    /**
     * @param EventId $eventId
     *
     * @return Event
     */
    public static function create(EventId $eventId)
    {
        return new Event($eventId);
    }

    /**
     * @param CharacterList $characters
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

    /**
     * @return CharacterList
     */
    public function getCharacters()
    {
        return $this->characters;
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
     * @param CreatorList $creators
     */
    public function setCreators($creators)
    {
        $this->creators = $creators;
    }

    /**
     * @return CreatorList
     */
    public function getCreators()
    {
        return $this->creators;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
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
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param EventSummary $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }

    /**
     * @return EventSummary
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param EventSummary $previous
     */
    public function setPrevious($previous)
    {
        $this->previous = $previous;
    }

    /**
     * @return EventSummary
     */
    public function getPrevious()
    {
        return $this->previous;
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
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
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
     * @param Image $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return Image
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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

    /**
     * Allow to be serialized by json_encode
     * http://stackoverflow.com/questions/7005860/php-json-encode-class-private-members
     * 
     * @return array
     */
    public function JsonSerialize()
    {
        return get_object_vars($this);
    }
}
