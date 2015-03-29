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
use Octante\MarvelAPIBundle\Model\Collections\SeriesCollection;
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
            ->send($baseUrl->getURL() . '?' . $query->getQuery());

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
     * @return SeriesCollection
     */
    public function getCharactersFromEvent($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'characters'
        );

        return $this->getSeriesCollection($baseUrl, $serieQuery);
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return SeriesCollection
     */
    public function getComicsFromEvent($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'comics'
        );

        return $this->getSeriesCollection($baseUrl, $serieQuery);
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return SeriesCollection
     */
    public function getCreatorsFromCreator($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'creators'
        );

        return $this->getSeriesCollection($baseUrl, $serieQuery);
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return SeriesCollection
     */
    public function getEventsFromCreator($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'events'
        );

        return $this->getSeriesCollection($baseUrl, $serieQuery);
    }

    /**
     * @param int $serieId
     * @param SerieQuery $serieQuery
     *
     * @return SeriesCollection
     */
    public function getStoriesFromCreator($serieId, SerieQuery $serieQuery)
    {
        $baseUrl = BaseURL::create(
            'series',
            SerieId::create($serieId)->getSerieId(),
            'stories'
        );

        return $this->getSeriesCollection($baseUrl, $serieQuery);
    }

    /**
     * @param BaseURL $baseUrl
     * @param SerieQuery $serieQuery
     *
     * @return SeriesCollection
     */
    private function getSeriesCollection($baseUrl, $serieQuery)
    {
        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $serieQuery->getQuery());

        return SeriesCollection::create(json_decode($data, true));
    }
} 