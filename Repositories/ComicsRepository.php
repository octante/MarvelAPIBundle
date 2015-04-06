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


use Octante\MarvelAPIBundle\Model\Collections\CharactersCollection;
use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
use Octante\MarvelAPIBundle\Model\Collections\CreatorsCollection;
use Octante\MarvelAPIBundle\Model\Collections\EventsCollection;
use Octante\MarvelAPIBundle\Model\Collections\StoriesCollection;
use Octante\MarvelAPIBundle\Model\Query\BaseURL;
use Octante\MarvelAPIBundle\Model\Query\ComicQuery;
use Octante\MarvelAPIBundle\Model\ValueObjects\ComicId;

class ComicsRepository
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
     * @param ComicQuery $query
     *
     * @return ComicsCollection
     */
    public function getComics(ComicQuery $query)
    {
        $baseUrl = BaseURL::create('comics');

        $data = $this->client
                     ->send($baseUrl->getURL() . $query->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $comicId
     *
     * @return ComicsCollection
     */
    public function getComicById($comicId)
    {
        $baseUrl = BaseURL::create(
            'comics', ComicId::create($comicId)->getComicId()
        );

        $data = $this->client
            ->send($baseUrl->getURL());

        return ComicsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $comicId
     * @param ComicQuery $comicQuery
     *
     * @return CharactersCollection
     */
    public function getCharactersFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'characters'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $comicQuery->getQuery());

        return CharactersCollection::create(json_decode($data, true));
    }

    /**
     * @param int $comicId
     * @param ComicQuery $comicQuery
     *
     * @return EventsCollection
     */
    public function getEventsFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'events'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $comicQuery->getQuery());

        return EventsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $comicId
     * @param ComicQuery $comicQuery
     *
     * @return CreatorsCollection
     */
    public function getCreatorsFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'creators'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $comicQuery->getQuery());

        return CreatorsCollection::create(json_decode($data, true));
    }

    /**
     * @param int $comicId
     * @param ComicQuery $comicQuery
     *
     * @return StoriesCollection
     */
    public function getStoriesFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'stories'
        );

        $data = $this->client
            ->send($baseUrl->getURL() . $comicQuery->getQuery());

        return StoriesCollection::create(json_decode($data, true));
    }
} 