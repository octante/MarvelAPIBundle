<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Collections\SeriesCollection;
use Octante\MarvelAPIBundle\Model\Query\SerieQuery;

class SeriesRepository
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
     * @param SerieQuery $query
     *
     * @return SeriesCollection
     */
    public function getSeries(SerieQuery $query)
    {
        $data = $this->client
                     ->send($query->getQuery());

        return SeriesCollection::create(json_decode($data, true));
    }

    /**
     * @param int $serieId
     */
    public function getSerieById($serieId)
    {
        // TO IMPLEMENT
    }
} 