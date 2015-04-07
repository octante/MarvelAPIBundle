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
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\SerieId;
use Octante\MarvelAPIBundle\Model\ValueObjects\Thumbnail;

class Serie implements \JsonSerializable
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
     * The first year of publication for the series.
     *
     * @var int
     */
    private $startYear;

    /**
     * The last year of publication for the series (conventionally, 2099 for ongoing series) .
     *
     * @var int
     */
    private $endYear;

    /**
     * The representative image for this comic.,
     *
     * @var Thumbnail
     */
    private $thumbnail;

    /**
     * The age-appropriateness rating for the series.,
     *
     * @var string
     */
    private $rating;

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
     * A summary representation of the series which follows this series.
     *
     * @var SerieSummary
     */
    private $next;

    /**
     * A summary representation of the series which preceded this series.
     *
     * @var SerieSummary
     */
    private $previous;

    /**
     * @param $serieId
     */
    private function __construct(SerieId $serieId)
    {
        $this->id = $serieId;
    }

    /**
     * @param SerieId $serieId
     *
     * @return Serie
     */
    public static function create(SerieId $serieId)
    {
        return new Serie($serieId);
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
     * @param int $endYear
     */
    public function setEndYear($endYear)
    {
        $this->endYear = $endYear;
    }

    /**
     * @return int
     */
    public function getEndYear()
    {
        return $this->endYear;
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
     * @param SerieSummary $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }

    /**
     * @return SerieSummary
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param SerieSummary $previous
     */
    public function setPrevious($previous)
    {
        $this->previous = $previous;
    }

    /**
     * @return SerieSummary
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * @param string $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
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
     * @param int $startYear
     */
    public function setStartYear($startYear)
    {
        $this->startYear = $startYear;
    }

    /**
     * @return int
     */
    public function getStartYear()
    {
        return $this->startYear;
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
     * @param Thumbnail $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return Thumbnail
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
     */
    public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}
