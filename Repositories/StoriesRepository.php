<?php
/*
 * This file is part of the MarvelAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Octante\MarvelAPIBundle\Repositories;


use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Collections\CharactersCollection;
use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;
use Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection;
use Octante\MarvelAPIBundle\Model\Collections\EventsCollection;
use Octante\MarvelAPIBundle\Model\Collections\SeriesCollection;
use Octante\MarvelAPIBundle\Model\Collections\StoriesCollection;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\StoryQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\StoryId;

class StoriesRepository
{
    /**
     * @var \Octante\MarvelAPIBundle\Lib\Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param StoryQuery $query
     *
     * @return StoriesCollection
     */
    public function getStories(StoryQuery $query)
    {
        $baseUrl = BaseURL::create('stories');

        $data = $this->client
            ->send($baseUrl->getURL() . $query->getQuery());

        return StoriesCollection::create(json_decode($data, true));
    }

    /**
     * @param int $storyId
     *
     * @return StoriesCollection
     */
    public function getStoryById($storyId)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId()
        );

        $data = $this->client
            ->send($baseUrl->getURL());

        return StoriesCollection::create(json_decode($data, true));
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return CharactersCollection
     */
    public function getCharactersFromStory($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'characters'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $storyQuery->getQuery());

        return CharactersCollection::create(json_decode($data, true));
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return ComicsCollection
     */
    public function getComicsFromStory($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'comics'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $storyQuery->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return CreatorsCollection
     */
    public function getCreatorsFromStory($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'creators'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $storyQuery->getQuery());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return eventsCollection
     */
    public function getEventsFromStory($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'events'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $storyQuery->getQuery());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return SeriesCollection
     */
    public function getSeriesFromStory($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'series'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $storyQuery->getQuery());

        return SeriesCollection::create(json_decode($data, true));
    }
} 