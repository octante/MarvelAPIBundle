<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\CreatorQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\CreatorId;

class CreatorsRepository
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
     * @param CreatorQuery $query
     *
     * @return CreatorsCollection
     */
    public function getCreators(CreatorQuery $query)
    {
        $data = $this->client
                     ->send($query->getQuery());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param CreatorId $creatorId
     *
     * @return CreatorsCollection
     */
    public function getCreatorById(CreatorId $creatorId)
    {
        $baseUrl = BaseURL::create('creators', $creatorId->getCreatorId());

        $data = $this->client
            ->send($baseUrl->getURL());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param CreatorId $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getComicsFromCreator(CreatorId $creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create('creators', $creatorId->getCreatorId(), 'comics');

        return $this->getCreatorsCollection($baseUrl, $creatorQuery);
    }

    /**
     * @param CreatorId $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getEventsFromCreator(CreatorId $creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create('comics', $creatorId->getCreatorId(), 'events');

        return $this->getCreatorsCollection($baseUrl, $creatorQuery);
    }

    /**
     * @param CreatorId $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getSeriesFromCreator(CreatorId $creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create('creators', $creatorId->getCreatorId(), 'series');

        return $this->getCreatorsCollection($baseUrl, $creatorQuery);
    }

    /**
     * @param CreatorId $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getStoriesFromCreator(CreatorId $creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create('creators', $creatorId->getCreatorId(), 'stories');

        return $this->getCreatorsCollection($baseUrl, $creatorQuery);
    }

    /**
     * @param BaseURL $baseUrl
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    private function getCreatorsCollection($baseUrl, $creatorQuery)
    {
        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $creatorQuery->getQuery());

        return CreatorsCollection::create(json_decode($data, true));
    }
} 