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
use Octante\MarvelAPIBundle\Model\Query\StoryQuery;

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
     * @param int $serieId
     */
    public function getStoryById($serieId)
    {
        // TO IMPLEMENT
    }
} 