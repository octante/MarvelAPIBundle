<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Collections\CreatorsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Query\CreatorQuery;

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
     * @param int $comicId
     */
    public function getComicById($comicId)
    {
        // TO IMPLEMENT
    }
} 