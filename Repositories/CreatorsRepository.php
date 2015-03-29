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


use Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\CreatorQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\CreatorId;

class CreatorsRepository
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
     * @param CreatorQuery $query
     *
     * @return CreatorsCollection
     */
    public function getCreators(CreatorQuery $query)
    {
        $baseUrl = BaseURL::create('creators');

        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $query->getQuery());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $creatorId
     *
     * @return CreatorsCollection
     */
    public function getCreatorById($creatorId)
    {
        $baseUrl = BaseURL::create(
            'creators',
            CreatorId::create($creatorId)->getCreatorId()
        );

        $data = $this->client
            ->send($baseUrl->getURL());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getComicsFromCreator($creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create(
            'creators',
            CreatorId::create($creatorId)->getCreatorId(),
            'comics'
        );

        return $this->getCreatorsCollection($baseUrl, $creatorQuery);
    }

    /**
     * @param int $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getEventsFromCreator($creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            CreatorId::create($creatorId)->getCreatorId(),
            'events'
        );

        return $this->getCreatorsCollection($baseUrl, $creatorQuery);
    }

    /**
     * @param int $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getSeriesFromCreator($creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create(
            'creators',
            CreatorId::create($creatorId)->getCreatorId(),
            'series'
        );

        return $this->getCreatorsCollection($baseUrl, $creatorQuery);
    }

    /**
     * @param int $creatorId
     * @param CreatorQuery $creatorQuery
     *
     * @return CreatorsCollection
     */
    public function getStoriesFromCreator($creatorId, CreatorQuery $creatorQuery)
    {
        $baseUrl = BaseURL::create(
            'creators',
            CreatorId::create($creatorId)->getCreatorId(),
            'stories'
        );

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