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


use Octante\MarvelAPIBundle\Model\Collections\ComicsCollection;
use Octante\MarvelAPIBundle\Lib\Client;
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
                     ->send($baseUrl->getURL() . '?' . $query->getQuery());

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
     * @return ComicsCollection
     */
    public function getCharactersFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'characters'
        );

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param int $comicId
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    public function getEventsFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'events'
        );

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param int $comicId
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    public function getCreatorsFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'creators'
        );

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param int $comicId
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    public function getStoriesFromComic($comicId, ComicQuery $comicQuery)
    {
        $baseUrl = BaseURL::create(
            'comics',
            ComicId::create($comicId)->getComicId(),
            'stories'
        );

        return $this->getComicsCollection($baseUrl, $comicQuery);
    }

    /**
     * @param BaseURL $baseUrl
     * @param ComicQuery $comicQuery
     *
     * @return ComicsCollection
     */
    private function getComicsCollection($baseUrl, $comicQuery)
    {
        $data = $this->client
            ->send($baseUrl->getURL() . '?' . $comicQuery->getQuery());

        return ComicsCollection::create(json_decode($data, true));
    }
} 