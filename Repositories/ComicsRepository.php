<?php
/**
 * Created by PhpStorm.
 * User: isselguberna
 * Date: 21/3/15
 * Time: 17:08
 */

namespace Octante\MarvelAPIBundle\Repositories;

use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Query\ComicQuery;

class ComicsRepository
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
     * @param ComicQuery $query
     *
     * @return ComicsCollection
     */
    public function getComics(ComicQuery $query)
    {
        $data = $this->client
                     ->send($query->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $comicId
     */
    public function getComicById($comicId)
    {
        // TO IMPLEMENT
    }
} 