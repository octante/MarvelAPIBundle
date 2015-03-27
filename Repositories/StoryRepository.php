<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Collections\StoriesCollection;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\StoryQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\StoryId;

class StoryRepository
{
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
    public function getStory(StoryQuery $query)
    {
        $data = $this->client
                     ->send($query->getQuery());

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
     * @return StoriesCollection
     */
    public function getCharactersFromStory($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'characters'
        );

        return $this->getStoriesCollection($baseUrl, $storyQuery);
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return StoriesCollection
     */
    public function getComicsFromStory($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'comics'
        );

        return $this->getStoriesCollection($baseUrl, $storyQuery);
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return StoriesCollection
     */
    public function getCreatorsFromCreator($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'creators'
        );

        return $this->getStoriesCollection($baseUrl, $storyQuery);
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return StoriesCollection
     */
    public function getEventsFromCreator($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'events'
        );

        return $this->getStoriesCollection($baseUrl, $storyQuery);
    }

    /**
     * @param int $storyId
     * @param StoryQuery $storyQuery
     *
     * @return StoriesCollection
     */
    public function getSeriesFromCreator($storyId, StoryQuery $storyQuery)
    {
        $baseUrl = BaseURL::create(
            'stories',
            StoryId::create($storyId)->getStoryId(),
            'series'
        );

        return $this->getStoriesCollection($baseUrl, $storyQuery);
    }

    /**
     * @param BaseURL $baseUrl
     * @param StoryQuery $storyQuery
     *
     * @return StoriesCollection
     */
    private function getStoriesCollection($baseUrl, $storyQuery)
    {
        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $storyQuery->getQuery());

        return StoriesCollection::create(json_decode($data, true));
    }
} 