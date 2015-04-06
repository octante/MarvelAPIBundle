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
use Octante\MarvelAPIBundle\Model\Query\SerieQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\SerieId;

class SeriesRepository
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
     * @param SerieQuery $query
     *
     * @return SeriesCollection
     */
    public function getSeries(SerieQuery $query)
    {
        $baseUrl = BaseURL::create('series');

        $data = $this->client
            ->send($baseUrl->getURL() . $query->getQuery());

        return SeriesCollection::create(json_decode($data, true));
    }

    /**
     * @param int $serieId
     *
     * @return SeriesCollection
     */
    public function getSerieById($serieId)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId()
        );

        $data = $this->client
            ->send($baseUrl->getURL());

        return SeriesCollection::create(json_decode($data, true));
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return CharactersCollection
     */
    public function getCharactersFromSerie($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'characters'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $serieQuery->getQuery());

        return CharactersCollection::create(json_decode($data, true));
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return ComicsCollection
     */
    public function getComicsFromSerie($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'comics'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $serieQuery->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return CreatorsCollection
     */
    public function getCreatorsFromSerie($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'creators'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $serieQuery->getQuery());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return EventsCollection
     */
    public function getEventsFromSerie($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'events'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $serieQuery->getQuery());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return StoriesCollection
     */
    public function getStoriesFromSerie($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'stories'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $serieQuery->getQuery());

        return StoriesCollection::create(json_decode($data, true));
    }
} 