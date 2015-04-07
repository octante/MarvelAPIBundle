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
use Octante\MarvelAPIBundle\Model\Lists\EventList;
use Octante\MarvelAPIBundle\Model\Summaries\SerieSummary;
use Octante\MarvelAPIBundle\Model\ValueObjects\Image;
use Octante\MarvelAPIBundle\Model\ValueObjects\StoryId;

class Story implements \JsonSerializable
{
    /**
     * The unique ID of the comic resource.,
     *
     * @var int
     */
    private $id;

    /**
     * The story title.
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
     * @var string
     */
    private $modified;

    /**
     * The story type e.g. interior story, cover, text story.
     *
     * @var string
     */
    private $type;

    /**
     * The canonical URL identifier for this resource.,
     *
     * @var string
     */
    private $resourceURI;

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
     * A resource list of characters which appear in this story.
     *
     * @var CharacterList
     */
    private $characters;

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
     * A resource list of creators who worked on this story.
     *
     * @var array
     */
    private $creators;

    /**
     * A summary representation of the issue in which this story was originally published.
     *
     * @var array
     */
    private $originalIssue;

    /**
     * @param $storyId
     */
    private function __construct(StoryId $storyId)
    {
        $this->id = $storyId;
    }

    /**
     * @param StoryId $storyId
     *
     * @return Story
     */
    public static function create(StoryId $storyId)
    {
        return new Story($storyId);
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
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param array $creators
     */
    public function setCreators($creators)
    {
        $this->creators = $creators;
    }

    /**
     * @return array
     */
    public function getCreators()
    {
        return $this->creators;
    }

    /**
     * @param array $originalIssue
     */
    public function setOriginalIssue($originalIssue)
    {
        $this->originalIssue = $originalIssue;
    }

    /**
     * @return array
     */
    public function getOriginalIssue()
    {
        return $this->originalIssue;
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
